<?php

namespace App\Http\Controllers;

use App\AcquiredFeature;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class AcquiredFeaturesController extends Controller
{
    use HydrogenControllerTrait;

    /**
     * AcquiredFeature Repository
     *
     * @var AcquiredFeature
     */
    protected $acquiredFeature;

    public function __construct()
    {
        $this->middleware('auth');
        $this->acquiredFeature = 'AcquiredFeature';
        $this->middleware('can:create,App\User,App\AcquiredFeature', ['only'=>['create','store']]);
        $this->middleware('can:update,App\User,App\AcquiredFeature', ['only'=>['edit','update']]);
        $this->middleware('can:index,App\User,App\AcquiredFeature', ['only'=>['index']]);
        $this->middleware('can:show,App\User,App\AcquiredFeature', ['only'=>['show']]);
        $this->middleware('can:delete,App\User,App\AcquiredFeature', ['only'=>['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $acquiredFeatures = AcquiredFeature::all();
        $model = $this->acquiredFeature;

        if ($request->ajax()) {
            $acquiredFeatures = Datatables::of($acquiredFeatures);
            // Actions.
            $acquiredFeatures->addColumn('action', function ($acquiredFeature) {
                $html = "
                    <form  method='post' action ='acquired-features/" . $acquiredFeature->id . "'>
                        <input type='hidden' name='_method' value='DELETE'/>
                        " . csrf_field() . "
                        <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                    </form>";

                return link_to_route('acquired-features.edit', 'Edit', array($acquiredFeature->id), array('class' => 'btn btn-info')) . $html;
            });
            // Route to profile.
            $acquiredFeatures->editColumn('id', function ($acquiredFeature) {
                return link_to_route(
                'acquired-features.show',
                $acquiredFeature->id,
                $acquiredFeature->id
              );
            });
            return $acquiredFeatures->make(true);
        }

        return view('backend.acquiredFeatures.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $model           = $this->acquiredFeature;
        $acquiredFeature = new AcquiredFeature;

        return view('backend.acquiredFeatures.create', compact('model', 'acquiredFeature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validations.
        $this->validate($request, AcquiredFeature::rules());

        $acquiredFeature = AcquiredFeature::create($request->input());

        return redirect()->route('categories.show', ['id' => $request->featureable_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $acquiredFeature = AcquiredFeature::findOrFail($id);
        $model           = $acquiredFeature;

        return view('backend.acquiredFeatures.show', compact('acquiredFeature', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $acquiredFeature = AcquiredFeature::findOrFail($id);
        $model           = $this->acquiredFeature;
        if (is_null($acquiredFeature)) {
            return redirect()->route('acquired-features.index');
        }

        return view('backend.acquiredFeatures.edit', compact('model', 'acquiredFeature'));
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
        $this->validate($request, AcquiredFeature::rules());

        $acquiredFeature = AcquiredFeature::findOrFail($id);
        $acquiredFeature->update($request->input());

        return redirect()->route('acquired-features.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $feature    = AcquiredFeature::findOrFail($id);
        $categoryId = $feature->featureable->id;
        $feature->delete();

        return redirect()->route('categories.show', ['id' => $categoryId]);
    }
}
