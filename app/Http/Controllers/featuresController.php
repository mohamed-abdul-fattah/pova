<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\feature;
use Illuminate\Http\Request;
use BaklySystems\Hydrogen\Models\Photo;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class featuresController extends Controller {
    use HydrogenControllerTrait;

	/**
	 * feature Repository
	 *
	 * @var feature
	 */
	protected $feature;

	public function __construct()
	{
        $this->middleware('auth');
        $this->feature = 'feature';
        $this->middleware('can:create,App\User,App\feature',['only'=>['create','store']]);
		$this->middleware('can:update,App\User,App\feature',['only'=>['edit','update']]);
		$this->middleware('can:index,App\User,App\feature',['only'=>['index']]);
		$this->middleware('can:show,App\User,App\feature',['only'=>['show']]);
		$this->middleware('can:delete,App\User,App\feature',['only'=>['delete']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
    $features = feature::all();
    $model = $this->feature;

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
    $model = $this->feature;
    $feature = new feature;

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
    $this->validate($request, feature::rules());

    $feature = feature::create($request->input());

    // Create polymorphic phones if relation exists.
    if (method_exists($feature, 'phones')) {
        foreach ($request->phones as $phone) {
            $feature->phones()->create(['phone' => $phone]);
        }
    }

    // Create polymorphic address if relation exists.
    if (method_exists($feature, 'address')) {
        $feature->address()->create([
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);
    }

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
		$feature = feature::findOrFail($id);
    $model = $feature;

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
		$feature = feature::findOrFail($id);
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
        $this->validate($request, feature::rules());

        $feature = feature::findOrFail($id);
        $feature->update($request->input());

        // Update polymorphic phones if relation exists.
        if (method_exists($feature, 'phones')) {
            foreach ($feature->phones as $phone) {
                $phone->delete();
            }
            foreach ($request->phones as $phone) {
                $feature->phones()->create(['phone' => $phone]);
            }
        }

        // Update polymorphic address if relation exists.
        if (method_exists($feature, 'address')) {
            $feature->address()->update([
                'address' => $request->address,
                'lat' => $request->lat,
                'lng' => $request->lng
            ]);
        }

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
		feature::findOrFail($id)->delete();

		return redirect()->route('features.index');
	}


	public function batchedit()
	{
        $features = feature::paginate(30);

	    return view('backend.features.batchedit', compact('features'));
	}

	public function batchupdate(Request $request)
	{
		foreach($request->features as $k=>$feature)
		{
            $featurei = feature::findOrFail($k);
            $featurei->update($feature);
	    }

		return redirect()->back()->with(array("message" => "Update Successful"));
	}


	public function createNested($id, $details)
    {
        $modelId = $id;
        $class = 'App\feature'; // just to support polymorphic nesting
        $detail = str_singular($details);
        $Detail = 'App\\'.ucwords($detail);
        ${$detail} = new $Detail;

        return view('backend.'.$details.'.create', compact('modelId','class',$detail));
    }
}
