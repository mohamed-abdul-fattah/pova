<?php

namespace App\Http\Controllers;

use App\City;
use Countries;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class CitiesController extends Controller
{
    use HydrogenControllerTrait;

    /**
     * City Repository
     *
     * @var City
     */
    protected $city;

    public function __construct()
    {
        $this->middleware('auth');
        $this->city = 'City';
        $this->middleware('can:create,App\User,App\City', ['only'=>['create','store']]);
        $this->middleware('can:update,App\User,App\City', ['only'=>['edit','update']]);
        $this->middleware('can:index,App\User,App\City', ['only'=>['index']]);
        $this->middleware('can:show,App\User,App\City', ['only'=>['show']]);
        $this->middleware('can:delete,App\User,App\City', ['only'=>['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        $model = $this->city;

        if ($request->ajax()) {
            $cities = Datatables::of($cities);
            // Actions.
            $cities->addColumn('action', function ($city) {
                $html = "
                <form  method='post' action ='cities/" . $city->id . "'>
                    <input type='hidden' name='_method' value='DELETE'/>
                    " . csrf_field() . "
                    <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                </form>";

                return link_to_route('cities.edit', 'Edit', array($city->id), array('class' => 'btn btn-info')) . $html;
            });
            // Route to profile.
            $cities->editColumn('id', function ($city) {
                return link_to_route(
                'cities.show',
                $city->id,
                $city->id
              );
            });
            // Country.
            $cities->editColumn('country', function ($city) {
                return $city->country()->name;
            });
            // Arabic name.
            $cities->editColumn('nameAr', function ($city) {
                return localName($city, 'Ar');
            });
            // English name.
            $cities->editColumn('nameEn', function ($city) {
                return localName($city);
            });

            return $cities->make(true);
        }

        return view('backend.cities.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $model     = $this->city;
        $city      = new City;
        $countries = Countries::all();

        return view('backend.cities.create', compact('model', 'city', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validations.
        $this->validate($request, City::rules());

        $name    = json_encode([
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr
        ]);
        $request = collect($request)->put('name', $name);
        $city    = City::create($request->all());

        return redirect()->route('cities.index', compact('city'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $city  = City::findOrFail($id);
        $model = $city;

        return view('backend.cities.show', compact('city', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $city      = City::findOrFail($id);
        $model     = $this->city;
        $countries = Countries::all();
        if (is_null($city)) {
            return redirect()->route('cities.index');
        }

        return view('backend.cities.edit', compact('model', 'city', 'countries'));
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
        $this->validate($request, City::rules());

        $name    = json_encode([
            'nameEn' => $request->nameEn,
            'nameAr' => $request->nameAr
        ]);
        $request = collect($request)->put('name', $name);
        $city    = City::findOrFail($id);
        $city->update($request->all());

        return redirect()->route('cities.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        City::findOrFail($id)->delete();

        return redirect()->route('cities.index');
    }
}
