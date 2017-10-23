<?php

namespace App\Http\Controllers;

use App\User;
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $model    = $this->resource;
        $resource = new Resource;

        return view('backend.resources.create', compact('model', 'resource'));
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

        // Create polymorphic address if relation exists.
        if (method_exists($resource, 'address')) {
            $resource->address()->create([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('resources.index', compact('resource'));
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
        $resource = Resource::findOrFail($id);
        $model    = $this->resource;
        if (is_null($resource)) {
            return redirect()->route('resources.index');
        }

        return view('backend.resources.edit', compact('model', 'resource'));
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

        // Update polymorphic address if relation exists.
        if (method_exists($resource, 'address')) {
            $resource->address()->update([
                'address' => $request->address,
                'lat'     => $request->lat,
                'lng'     => $request->lng
            ]);
        }

        return redirect()->route('resources.show', $id);
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
