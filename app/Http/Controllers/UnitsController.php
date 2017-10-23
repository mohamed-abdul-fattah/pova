<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class UnitsController extends Controller
{
    use HydrogenControllerTrait;

	/**
	 * Unit Repository
	 *
	 * @var Unit
	 */
	protected $unit;

	public function __construct()
	{
        $this->middleware('auth');
        $this->unit = 'Unit';
        $this->middleware('can:create,App\User,App\Unit',['only'=>['create','store']]);
		$this->middleware('can:update,App\User,App\Unit',['only'=>['edit','update']]);
		$this->middleware('can:index,App\User,App\Unit',['only'=>['index']]);
		$this->middleware('can:show,App\User,App\Unit',['only'=>['show']]);
		$this->middleware('can:delete,App\User,App\Unit',['only'=>['delete']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $units = Unit::all();
        $model = $this->unit;

        if ($request->ajax()) {
          $units = Datatables::of($units);
          // Actions.
          $units->addColumn('action', function ($unit) {
              $html = "
                <form  method='post' action ='units/" . $unit->id . "'>
                    <input type='hidden' name='_method' value='DELETE'/>
                    " . csrf_field() . "
                    <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                </form>";

              return link_to_route('units.edit', 'Edit', array($unit->id), array('class' => 'btn btn-info')) . $html;

          });
          // Route to profile.
          $units->editColumn('id', function ($unit) {
              return link_to_route(
                'units.show',
                $unit->id,
                $unit->id
              );
          });
          return $units->make(true);
        }

		return view('backend.units.index', compact('model'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $model = $this->unit;
        $unit = new Unit;

		return view('backend.units.create', compact('model', 'unit'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        // Validations.
        $this->validate($request, Unit::rules());

        $unit = Unit::create($request->input());

        // Create polymorphic phones if relation exists.
        if (method_exists($unit, 'phones')) {
            foreach ($request->phones as $phone) {
                $unit->phones()->create(['phone' => $phone]);
            }
        }

        // Create polymorphic address if relation exists.
        if (method_exists($unit, 'address')) {
            $unit->address()->create([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('units.index', compact('unit'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$unit = Unit::findOrFail($id);
        $model = $unit;

		return view('backend.units.show', compact('unit', 'model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$unit = Unit::findOrFail($id);
        $model = $this->unit;
		if (is_null($unit)) {
			return redirect()->route('units.index');
		}

		return view('backend.units.edit', compact('model', 'unit'));
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
        $this->validate($request, Unit::rules());

        $unit = Unit::findOrFail($id);
        $unit->update($request->input());

        // Update polymorphic phones if relation exists.
        if (method_exists($unit, 'phones')) {
            foreach ($unit->phones as $phone) {
                $phone->delete();
            }
            foreach ($request->phones as $phone) {
                $unit->phones()->create(['phone' => $phone]);
            }
        }

        // Update polymorphic address if relation exists.
        if (method_exists($unit, 'address')) {
            $unit->address()->update([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('units.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Unit::findOrFail($id)->delete();

		return redirect()->route('units.index');
	}


	public function batchedit()
	{
        $units = Unit::paginate(30);

	    return view('backend.units.batchedit', compact('units'));
	}

	public function batchupdate(Request $request)
	{
		foreach($request->units as $key => $unit)
		{
            $uniti = Unit::findOrFail($key);
            $uniti->update($unit);
	    }

		return redirect()->back()->with(array("message" => "Update Successful"));
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
        $class     = 'App\Unit'; // just to support polymorphic nesting
        $detail    = str_singular($details);
        $Detail    = 'App\\'.studly_case($detail);
        ${$detail} = new $Detail;

        return view('backend.'.$details.'.create', compact('modelId','class',$detail));
    }
}
