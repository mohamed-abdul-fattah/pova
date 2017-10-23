<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class PricesController extends Controller
{
    use HydrogenControllerTrait;

	/**
	 * Price Repository
	 *
	 * @var Price
	 */
	protected $price;

	public function __construct()
	{
        $this->middleware('auth');
        $this->price = 'Price';
        $this->middleware('can:create,App\User,App\Price',['only'=>['create','store']]);
		$this->middleware('can:update,App\User,App\Price',['only'=>['edit','update']]);
		$this->middleware('can:index,App\User,App\Price',['only'=>['index']]);
		$this->middleware('can:show,App\User,App\Price',['only'=>['show']]);
		$this->middleware('can:delete,App\User,App\Price',['only'=>['delete']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $prices = Price::all();
        $model = $this->price;

        if ($request->ajax()) {
          $prices = Datatables::of($prices);
          // Actions.
          $prices->addColumn('action', function ($price) {
              $html = "
                <form  method='post' action ='prices/" . $price->id . "'>
                    <input type='hidden' name='_method' value='DELETE'/>
                    " . csrf_field() . "
                    <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                </form>";

              return link_to_route('prices.edit', 'Edit', array($price->id), array('class' => 'btn btn-info')) . $html;

          });
          // Route to profile.
          $prices->editColumn('id', function ($price) {
              return link_to_route(
                'prices.show',
                $price->id,
                $price->id
              );
          });
          return $prices->make(true);
        }

		return view('backend.prices.index', compact('model'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $model = $this->price;
        $price = new Price;

		return view('backend.prices.create', compact('model', 'price'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        // Validations.
        $this->validate($request, Price::rules());

        $price = Price::create($request->input());

        // Create polymorphic phones if relation exists.
        if (method_exists($price, 'phones')) {
            foreach ($request->phones as $phone) {
                $price->phones()->create(['phone' => $phone]);
            }
        }

        // Create polymorphic address if relation exists.
        if (method_exists($price, 'address')) {
            $price->address()->create([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('prices.index', compact('price'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$price = Price::findOrFail($id);
        $model = $price;

		return view('backend.prices.show', compact('price', 'model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$price = Price::findOrFail($id);
        $model = $this->price;
		if (is_null($price)) {
			return redirect()->route('prices.index');
		}

		return view('backend.prices.edit', compact('model', 'price'));
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
        $this->validate($request, Price::rules());

        $price = Price::findOrFail($id);
        $price->update($request->input());

        // Update polymorphic phones if relation exists.
        if (method_exists($price, 'phones')) {
            foreach ($price->phones as $phone) {
                $phone->delete();
            }
            foreach ($request->phones as $phone) {
                $price->phones()->create(['phone' => $phone]);
            }
        }

        // Update polymorphic address if relation exists.
        if (method_exists($price, 'address')) {
            $price->address()->update([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('prices.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Price::findOrFail($id)->delete();

		return redirect()->route('prices.index');
	}


	public function batchedit()
	{
        $prices = Price::paginate(30);

	    return view('backend.prices.batchedit', compact('prices'));
	}

	public function batchupdate(Request $request)
	{
		foreach($request->prices as $key => $price)
		{
            $pricei = Price::findOrFail($key);
            $pricei->update($price);
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
        $class     = 'App\Price'; // just to support polymorphic nesting
        $detail    = str_singular($details);
        $Detail    = 'App\\'.studly_case($detail);
        ${$detail} = new $Detail;

        return view('backend.'.$details.'.create', compact('modelId','class',$detail));
    }
}
