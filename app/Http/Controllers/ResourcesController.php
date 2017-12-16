<?php

namespace App\Http\Controllers;

use Closure;
use App\User;
use App\City;
use App\Unit;
use Countries;
use App\Feature;
use App\Category;
use App\Resource;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class ResourcesController extends Controller
{
    use HydrogenControllerTrait;

    /**
     * Resource Repository
     *
     * @var Resource
     */
    protected $resource;

    public function __construct()
    {
        $this->middleware('auth')->except('frontShow');
        $this->resource = 'Resource';
        $this->middleware('can:create,App\User,App\Resource', ['only'=>['create','store']]);
        $this->middleware('can:update,App\User,App\Resource', ['only'=>['edit','update']]);
        $this->middleware('can:index,App\User,App\Resource', ['only'=>['index']]);
        $this->middleware('can:show,App\User,App\Resource', ['only'=>['show']]);
        $this->middleware('can:delete,App\User,App\Resource', ['only'=>['delete']]);
        /**
         * Navigation only to provider's resources.
         */
        $this->middleware(function(Request $request, Closure $next) {
            $resource = Resource::find($request->id);
            if (auth()->id() === $resource->user_id) {
                return $next($request);
            }
            return redirect()->back();
        })->only('frontEdit', 'frontUpdate', 'frontDestroy');
    }

    /**
     * Store acquired features for a resource.
     *
     * @param  object  $resource
     * @param  array  $features
     * @return void
     */
    protected function addFeatures($resource, $features)
    {
        foreach ($features as $featureId => $featureVal) {
            if ($featureVal) {
                $feature = Feature::findOrFail($featureId);
                if ($feature->type === 'string' || $feature->type === 'email' || $feature->type === 'selection') {
                    $value = 'string';
                } elseif ($feature->type === 'number') {
                    $value = 'number';
                } elseif ($feature->type === 'boolean') {
                    $value = 'boolean';
                } elseif ($feature->type === 'text') {
                    $value = 'text';
                }
                $resource->acquiredFeatures()->create([
                    'feature_id'   => $featureId,
                    "value_$value" => $featureVal
                ]);
            }
        }
    }

    /**
     * Store photos for a resource.
     *
     * @param  object  $resource
     * @param  array  $photos
     * @return void
     */
    protected function addPhotos($resource, $photos)
    {
        foreach ($photos as $key => $photo) {
            $resource->uploadPhoto($photo, 0, 'images/resources', 0, 395, 200, "$resource->title Photo");
        }
    }

    /**
     * Store cover photo for a resource.
     *
     * @param  object  $resource
     * @param  file  $file
     * @return void
     */
    public function addCover($resource, $file)
    {
        $resource->uploadPhoto($file, 0, 'images/resources', 1, "$resource->title Cover Photo");
    }

    /**
     * Set availabilities for a resource.
     *
     * @param  object  $resource
     * @param  array  $froms
     * @param  array  $tos
     * @param  array  $seasonalPrices
     * @param  int  $unitId
     * @return void
     */
    protected function setAvailabilities($resource, $froms, $tos, $seasonalPrices, $unitId)
    {
        foreach ($froms as $key => $from) {
            if ($from && $tos[$key]) { // only if type, from and end are set.
                $availability = $resource->availabilities()->create([
                    'start' => date('Y-m-d', strtotime($from)),
                    'end'   => date('Y-m-d', strtotime($tos[$key])),
                    'type'  => 'seasonal'
                ]);

                if ($seasonalPrices[$key]) { // if seasonal price is set.
                    $resource->prices()->create([
                        'unit_id'         => $unitId,
                        'availability_id' => $availability->id,
                        'price'           => $seasonalPrices[$key],
                        'currency'        => 'EGP'
                    ]);
                }
            }
        }
    }

    /**
     * Set unavailable dates.
     *
     * @param  object  $resource
     * @param  string  $dates
     * @return void
     */
    protected function setUnavailableDates($resource, $dates)
    {
        $datesArr = explode(',', $dates);
        foreach ($datesArr as $key => $date) {
            $resource->availabilities()->create([
                'start' => date('Y-m-d H:i:s', strtotime($date)),
                'type'  => 'unavailable'
            ]);
        }
    }

    /**
     * Create extra prices for a resource.
     *
     * @param  object  $resource
     * @param  int  $unitId
     * @param  array  $prices
     * @param  array  $descriptions
     * @param  int  $availabilityId (optional)
     * @return void
     */
    protected function addExtras($resource, $unitId, $prices, $descriptions, $availabilityId = 0)
    {
        foreach ($prices as $key => $price) {
            if ($price) {
                $resource->prices()->create([
                    'unit_id'         => $unitId,
                    'availability_id' => $availabilityId,
                    'price'           => $price,
                    'currency'        => 'EGP',
                    'description'     => $descriptions[$key],
                    'extra'           => 1
                ]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $resources = Resource::all();
        $model     = $this->resource;

        if ($request->ajax()) {
            $resources = Datatables::of($resources);
            // Actions.
            $resources->addColumn('action', function ($resource) {
                $html = "
                    <form  method='post' action ='resources/" . $resource->id . "'>
                        <input type='hidden' name='_method' value='DELETE'/>
                        " . csrf_field() . "
                        <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                    </form>";

                return link_to_route('resources.edit', 'Edit', array($resource->id), array('class' => 'btn btn-info')) . $html;
            });
            // Route to profile.
            $resources->editColumn('id', function ($resource) {
                return link_to_route(
                'resources.show',
                $resource->id,
                $resource->id
              );
            });
            // Route to profile.
            $resources->editColumn('title', function ($resource) {
                return link_to_route(
                    'resources.show',
                    $resource->title,
                    $resource->id
                );
            });
            // Category.
            $resources->editColumn('category', function ($resource) {
                return nameLocale($resource->category, 'En');
            });
            // Owner.
            $resources->editColumn('owner', function ($resource) {
                return $resource->owner->name;
            });
            // Featured.
            $resources->editColumn('featured', function ($resource) {
                return ($resource->featured) ? 'True' : 'False';
            });

            return $resources->make(true);
        }

        return view('backend.resources.index', compact('model'));
    }

    /**
     * Display a listing of the resources (frontend).
     *
     * @return Response
     */
    public function frontIndex()
    {
        $resources = Resource::whereUserId(auth()->id())
            ->orderby('updated_at', 'DESC')
            ->get();
        $desc      = Feature::whereName(json_encode(['nameEn' => 'Description','nameAr' => 'الوصف']))->first();

        return view('frontend.resources.index', compact('resources', 'desc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $model      = $this->resource;
        $resource   = new Resource;
        $providers  = User::whereType('provider')->orderby('name')->get();
        $categories = Category::where('parent_id', 0)->get();

        return view('backend.resources.create', compact('model', 'resource', 'providers', 'categories'));
    }

    /**
     * Show the form for creating a new resource (frontend).
     *
     * @return Response
     */
    public function frontCreate()
    {
        $resource   = new Resource;
        $countries  = Countries::all();
        $cities     = City::orderby('name')->get();
        $categories = Category::with('subCategories')->whereParentId(0)->orderby('name')->get();

        return view('frontend.resources.create', compact(
            'resource', 'countries', 'cities', 'categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validations.
        $this->validate($request, Resource::rules());

        $resource = Resource::create($request->input());

        // Address.
        $resource->address()->create([
            'address' => $request->address,
            'lat'     => $request->lat,
            'lng'     => $request->lng
        ]);

        return redirect()->route('resources.index', compact('resource'));
    }

    /**
     * Store a newly created resource in storage (frontend).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function frontStore(Request $request)
    {
        $this->validate($request, Resource::rules());

        $unit     = Unit::first();
        $request  = collect($request)->put('user_id', auth()->id())
            ->put('unit_id', $unit->id)
            ->put('currency', 'EGP');
        $resource = Resource::create($request->all());

        // Address.
        $resource->address()->create($request->all());

        // Base price.
        $resource->basePrice()->create($request->all());

        // Extra prices.
        if ($request->get('prices')) {
            $this->addExtras($resource, $unit->id, $request->get('prices'), $request->get('descriptions'));
        }

        // Store features.
        if ($request->has('features')) {
            $this->addFeatures($resource, $request->get('features'));
        }

        // Add cover photo.
        if ($request->has('cover')) {
            $this->addCover($resource, $request->get('cover'));
        }

        // Add photos.
        if ($request->has('photos')) {
            $this->addPhotos($resource, $request->get('photos'));
        }

        // Set availabilities.
        // Unavailable dates.
        if ($request->has('unavailableDates')) {
            $this->setUnavailableDates($resource, $request->get('unavailableDates'));
        }
        // Seasonal dates.
        if (count($request->get('from'))) {
            $this->setAvailabilities(
                $resource,
                $request->get('from'),
                $request->get('to'),
                $request->get('seasonalPrice'),
                $unit->id
            );
        }

        return redirect('/resources');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $resource = Resource::findOrFail($id);
        $model    = $resource;

        return view('backend.resources.show', compact('resource', 'model'));
    }

    /**
     * Display the specified resource (frontend).
     *
     * @param  int  $id
     * @return Response
     */
    public function frontShow($id)
    {
        $resource = Resource::with('acquiredFeatures')->findOrFail($id);
        $desc     = Feature::whereName(json_encode(['nameEn' => 'Description','nameAr' => 'الوصف']))->first();

        return view('frontend.resources.show', compact('resource', 'desc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $resource   = Resource::findOrFail($id);
        $model      = $this->resource;
        $providers  = User::whereType('provider')->orderby('name')->get();
        $categories = Category::where('parent_id', 0)->get();
        $isEdit     = true;
        if (is_null($resource)) {
            return redirect()->route('resources.index');
        }

        return view('backend.resources.edit', compact('model', 'resource', 'providers', 'categories', 'isEdit'));
    }

    /**
     * Show the form for editing the specified resource (frontend).
     *
     * @param  int  $id
     * @return Response
     */
    public function frontEdit($id)
    {
        $resource   = Resource::findOrFail($id);
        $countries  = Countries::all();
        $cities     = City::orderby('name')->get();
        $categories = Category::with('subCategories')->whereParentId(0)->orderby('name')->get();
        $isEdit     = true;

        return view('frontend.resources.edit', compact(
            'resource', 'countries', 'cities', 'categories', 'isEdit'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->has('featured')) { // unfeature resource.
            $request['featured'] = false;
        }
        // Validations.
        // $this->validate($request, Resource::rules()); // tobe back when we add full functionality.
        $this->validate($request, [
            'category_id' => 'required|integer',
            'user_id'     => 'required|integer',
            'title'       => 'required|string|max:255',
            'featured'    => 'boolean',
            'address'     => 'required|string|max:255',
            'lat'         => 'required|numeric',
            'lng'         => 'required|numeric'
        ]);

        $resource = Resource::findOrFail($id);
        $resource->update($request->input());

        $resource->address()->update([
            'address' => $request->address,
            'lat'     => $request->lat,
            'lng'     => $request->lng
        ]);

        return redirect()->route('resources.show', $id);
    }

    /**
     * Update the specified resource in storage (frontend).
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function frontUpdate($id, Request $request)
    {
        $this->validate($request, Resource::rules());

        $unit     = Unit::first();
        $resource = Resource::findOrFail($id);
        $resource->update($request->only('category_id', 'title'));

        // Address.
        $resource->address()->update($request->only(
            'lat',
            'lng',
            'address',
            'country_id',
            'city_id'
        ));

        // Update base price.
        $resource->basePrice()->update($request->only('price', 'description'));

        // Create extra prices.
        if ($request->has('prices')) {
            $resource->extras()->delete();
            $this->addExtras($resource, $unit->id, $request->prices, $request->descriptions);
        }

        // Update features.
        if ($request->has('features')) {
            $resource->acquiredFeatures()->delete();
            $this->addFeatures($resource, $request->get('features'));
        }

        // Update cover photo.
        if ($request->hasFile('cover')) {
            if ($resource->photos()->whereCover(1)->first()) {
                $resource->photos()->whereCover(1)->first()->update(['cover' => 0]);
            }
            $this->addCover($resource, $request->file('cover'));
        }

        // Upload photos.
        if ($request->has('photos')) {
            $this->addPhotos($resource, $request->photos);
        }

        // Update availabilities.
        // Unavailable dates.
        if ($request->has('unavailableDates')) {
            $resource->availabilities()->whereType('unavailable')->delete();
            $this->setUnavailableDates($resource, $request->unavailableDates);
        }
        // Seasonal dates.
        if (count($request->get('from'))) {
            foreach ($resource->availabilities()->whereType('seasonal')->get() as $key => $avail) {
                $avail->seasonalPrice()->delete();
                $avail->delete();
            }
            $this->setAvailabilities(
                $resource,
                $request->get('from'),
                $request->get('to'),
                $request->get('seasonalPrice'),
                $unit->id
            );
        }

        return redirect('/resources')->with([
            'success' => true,
            'message' => 'Resource updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Resource::findOrFail($id)->delete();

        return redirect()->route('resources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function frontDestroy($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->acquiredFeatures()->delete();
        $resource->address()->delete();
        $resource->prices()->delete();
        foreach ($resource->photos as $key => $photo) {
            $resource->deletePhoto('images/resources', $photo);
        }
        $resource->availabilities()->delete();
        $resource->delete();

        return redirect('/resources')->with([
            'success' => true,
            'message' => 'Resource deleted successfully'
        ]);
    }

    /**
     * Delete resource photo.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function deletePhoto($id, Request $request)
    {
        $resource = Resource::findOrFail($request->resourceId);
        $photo    = $resource->photos()->find($id);
        $resource->deletePhoto('images/resources', $photo);

        return response()->json(['success' => true], 200);
    }

    /**
     * Create nested resource.
     *
     * @param  int  $id
     * @param  string  $details
     * @return Response
     */
    public function createNested($id, $details)
    {
        $modelId   = $id;
        $class     = 'App\Resource'; // just to support polymorphic nesting
        $detail    = str_singular($details);
        $Detail    = 'App\\'.studly_case($detail);
        ${$detail} = new $Detail;

        return view('backend.'.$details.'.create', compact('modelId', 'class', $detail));
    }
}
