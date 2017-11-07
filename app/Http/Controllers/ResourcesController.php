<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\Unit;
use App\Price;
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
        $this->middleware('auth');
        $this->resource = 'Resource';
        $this->middleware('can:create,App\User,App\Resource', ['only'=>['create','store']]);
        $this->middleware('can:update,App\User,App\Resource', ['only'=>['edit','update']]);
        $this->middleware('can:index,App\User,App\Resource', ['only'=>['index']]);
        $this->middleware('can:show,App\User,App\Resource', ['only'=>['show']]);
        $this->middleware('can:delete,App\User,App\Resource', ['only'=>['delete']]);
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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $resources = Resource::all();
        $model = $this->resource;

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
        $categories = Category::where('parent_id', '<>', 0)->get();

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
        $units      = Unit::orderby('name')->get();

        return view('frontend.resources.create', compact(
            'resource', 'countries', 'cities', 'categories', 'units'
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

        $request  = collect($request)->put('user_id', auth()->id())
            ->put('currency', 'EGP');
        $resource = Resource::create($request->all());

        // Address.
        $resource->address()->create([
            'address'    => $request->get('address'),
            'lat'        => $request->get('lat'),
            'lng'        => $request->get('lng'),
            'country_id' => $request->get('country_id'),
            'city_id'    => $request->get('city_id')
        ]);

        // Base price.
        Price::create([
            'resource_id'     => $resource->id,
            'unit_id'         => $request->get('unit_id'),
            'availability_id' => 0,
            'price'           => $request->get('price'),
            'currency'        => $request->get('currency')
        ]);

        // Store features.
        if ($request->has('features')) {
            $this->addFeatures($resource, $request->get('features'));
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
        $categories = Category::where('parent_id', '<>', 0)->get();
        if (is_null($resource)) {
            return redirect()->route('resources.index');
        }

        return view('backend.resources.edit', compact('model', 'resource', 'providers', 'categories'));
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
        $units      = Unit::orderby('name')->get();
        $isEdit     = true;

        return view('frontend.resources.edit', compact(
            'resource', 'countries', 'cities', 'categories', 'units', 'isEdit'
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
        // Validations.
        $this->validate($request, Resource::rules());

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
     * @return Response
     */
    public function frontUpdate($id)
    {
        $this->validate($request, Resource::rules());

        $resource = Resource::findOrFail($id);
        $resource->update($request->all());

        return redirect('/resources')->with([
            'success' => true,
            'message' => 'The resource was updated successfully.'
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
