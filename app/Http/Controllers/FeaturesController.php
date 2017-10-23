<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class FeaturesController extends Controller
{
    use HydrogenControllerTrait;

    /**
     * Feature Repository
     *
     * @var Feature
     */
    protected $feature;

    public function __construct()
    {
        $this->middleware('auth');
        $this->feature = 'Feature';
        $this->middleware('can:create,App\User,App\Feature', ['only'=>['create','store']]);
        $this->middleware('can:update,App\User,App\Feature', ['only'=>['edit','update']]);
        $this->middleware('can:index,App\User,App\Feature', ['only'=>['index']]);
        $this->middleware('can:show,App\User,App\Feature', ['only'=>['show']]);
        $this->middleware('can:delete,App\User,App\Feature', ['only'=>['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $features = Feature::all();
        $model    = $this->feature;

        if ($request->ajax()) {
            $features = Datatables::of($features);
            // Actions.
            $features->addColumn('action', function ($feature) {
                $html = "
                  <form  method='post' action ='features/" . $feature->id . "'>
                    <input type='hidden' name='_method' value='DELETE'/>
                    " . csrf_field() . "
                    <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                  </form>";

                return link_to_route('features.edit', 'Edit', array($feature->id), array('class' => 'btn btn-info')) . $html;
            });
            // Route to profile.
            $features->editColumn('id', function ($feature) {
                return link_to_route(
                    'features.show',
                    $feature->id,
                    $feature->id
                );
            });
            // Arabic Name
            $features->editColumn('nameAr', function ($feature) {
                return name($feature, 'Ar');
            });
            // English Name
            $features->editColumn('nameEn', function ($feature) {
                return name($feature);
            });
            // Required.
            $features->editColumn('required', function ($feature) {
                return ($feature->required) ? 'Required' : 'Optional';
            });

            return $features->make(true);
        }

        return view('backend.features.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $model   = $this->feature;
        $feature = new Feature;

        return view('backend.features.create', compact('model', 'feature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validations.
        $this->validate($request, Feature::rules());

        $name    = json_encode([
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr
        ]);
        $request = collect($request)->put('name', $name);
        $feature = Feature::create($request->all());

        return redirect()->route('features.index', compact('feature'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $feature = Feature::findOrFail($id);
        $model   = $feature;

        return view('backend.features.show', compact('feature', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        $model = $this->feature;
        if (is_null($feature)) {
            return redirect()->route('features.index');
        }

        return view('backend.features.edit', compact('model', 'feature'));
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
        $this->validate($request, Feature::rules());

        $feature = Feature::findOrFail($id);
        $name    = json_encode([
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr
        ]);
        $request = collect($request)->put('name', $name);
        if (!$request->has('required')) { // when required field is not selected, store it as false.
            $request = collect($request)->put('required', 0);
        }
        if ($request->get('type') !== 'selection') { // when type is not selections, delete selections.
            $request = collect($request)->put('selections', '');
        }
        $feature->update($request->all());

        return redirect()->route('features.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Feature::findOrFail($id)->delete();

        return redirect()->route('features.index');
    }
}
