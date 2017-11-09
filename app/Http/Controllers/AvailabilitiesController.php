<?php

namespace App\Http\Controllers;

use App\Availability;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class AvailabilitiesController extends Controller
{
    use HydrogenControllerTrait;

	/**
	 * Availability Repository
	 *
	 * @var Availability
	 */
	protected $availability;

	public function __construct()
	{
        $this->middleware('auth');
        $this->availability = 'Availability';
        $this->middleware('can:create,App\User,App\Availability',['only'=>['create','store']]);
		$this->middleware('can:update,App\User,App\Availability',['only'=>['edit','update']]);
		$this->middleware('can:index,App\User,App\Availability',['only'=>['index']]);
		$this->middleware('can:show,App\User,App\Availability',['only'=>['show']]);
		$this->middleware('can:delete,App\User,App\Availability',['only'=>['delete']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $availabilities = Availability::all();
        $model = $this->availability;

        if ($request->ajax()) {
          $availabilities = Datatables::of($availabilities);
          // Actions.
          $availabilities->addColumn('action', function ($availability) {
              $html = "
                <form  method='post' action ='availabilities/" . $availability->id . "'>
                    <input type='hidden' name='_method' value='DELETE'/>
                    " . csrf_field() . "
                    <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                </form>";

              return link_to_route('availabilities.edit', 'Edit', array($availability->id), array('class' => 'btn btn-info')) . $html;

          });
          // Route to profile.
          $availabilities->editColumn('id', function ($availability) {
              return link_to_route(
                'availabilities.show',
                $availability->id,
                $availability->id
              );
          });
          return $availabilities->make(true);
        }

		return view('backend.availabilities.index', compact('model'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $model = $this->availability;
        $availability = new Availability;

		return view('backend.availabilities.create', compact('model', 'availability'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        // Validations.
        $this->validate($request, Availability::rules());

        $availability = Availability::create($request->input());

        // Create polymorphic phones if relation exists.
        if (method_exists($availability, 'phones')) {
            foreach ($request->phones as $phone) {
                $availability->phones()->create(['phone' => $phone]);
            }
        }

        // Create polymorphic address if relation exists.
        if (method_exists($availability, 'address')) {
            $availability->address()->create([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('availabilities.index', compact('availability'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$availability = Availability::findOrFail($id);
        $model = $availability;

		return view('backend.availabilities.show', compact('availability', 'model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$availability = Availability::findOrFail($id);
        $model = $this->availability;
		if (is_null($availability)) {
			return redirect()->route('availabilities.index');
		}

		return view('backend.availabilities.edit', compact('model', 'availability'));
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
        $this->validate($request, Availability::rules());

        $availability = Availability::findOrFail($id);
        $availability->update($request->input());

        // Update polymorphic phones if relation exists.
        if (method_exists($availability, 'phones')) {
            foreach ($availability->phones as $phone) {
                $phone->delete();
            }
            foreach ($request->phones as $phone) {
                $availability->phones()->create(['phone' => $phone]);
            }
        }

        // Update polymorphic address if relation exists.
        if (method_exists($availability, 'address')) {
            $availability->address()->update([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('availabilities.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Availability::findOrFail($id)->delete();

		return redirect()->route('availabilities.index');
	}


	public function batchedit()
	{
        $availabilities = Availability::paginate(30);

	    return view('backend.availabilities.batchedit', compact('availabilities'));
	}

	public function batchupdate(Request $request)
	{
		foreach($request->availabilities as $key => $availability)
		{
            $availabilityi = Availability::findOrFail($key);
            $availabilityi->update($availability);
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
        $class     = 'App\Availability'; // just to support polymorphic nesting
        $detail    = str_singular($details);
        $Detail    = 'App\\'.studly_case($detail);
        ${$detail} = new $Detail;

        return view('backend.'.$details.'.create', compact('modelId','class',$detail));
    }
}
