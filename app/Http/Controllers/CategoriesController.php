<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Category;
use Illuminate\Http\Request;
use BaklySystems\Hydrogen\Models\Photo;
use Yajra\DataTables\Facades\DataTables;
use BaklySystems\Hydrogen\Http\Controllers\HydrogenControllerTrait;

class CategoriesController extends Controller
{
    use HydrogenControllerTrait;

    /**
     * Category Repository
     *
     * @var Category
     */
    protected $category;

    public function __construct()
    {
        $this->middleware('auth');
        $this->category = 'Category';
        $this->middleware('can:create,App\User,App\Category', ['only'=>['create','store']]);
        $this->middleware('can:update,App\User,App\Category', ['only'=>['edit','update']]);
        $this->middleware('can:index,App\User,App\Category', ['only'=>['index']]);
        $this->middleware('can:show,App\User,App\Category', ['only'=>['show']]);
        $this->middleware('can:delete,App\User,App\Category', ['only'=>['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $model = $this->category;

        if ($request->ajax()) {
            $categories = Datatables::of($categories);
            // Actions.
            $categories->addColumn('action', function ($category) {
                $html = "
                    <form  method='post' action ='categories/" . $category->id . "'>
                        <input type='hidden' name='_method' value='DELETE'/>
                        " . csrf_field() . "
                        <button class='btn btn-danger' onclick='confirmDelete(event)'>Delete</button>
                    </form>";

                return link_to_route('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-info')) . $html;
            });
            // Route to profile.
            $categories->editColumn('id', function ($category) {
                return link_to_route(
                    'categories.show',
                    $category->id,
                    $category->id
                );
            });
            // Parent category.
            $categories->editColumn('parent', function ($category) {
                return $category->parent();
            });

            return $categories->make(true);
        }

        return view('backend.categories.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $model = $this->category;
        $category = new Category;
        $categories = Category::whereParentId(0)->get();

        return view('backend.categories.create', compact('model', 'category', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validations.
        $this->validate($request, Category::$rules);

        $category = Category::create($request->input());

        return redirect()->route('categories.index', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $model = $category;

        return view('backend.categories.show', compact('category', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $model = $this->category;
        $categories = Category::whereParentId(0)->get();

        if (is_null($category)) {
            return redirect()->route('categories.index');
        }

        return view('backend.categories.edit', compact('model', 'category', 'categories'));
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
        $this->validate($request, Category::$rules);

        $category = Category::findOrFail($id);
        $category->update($request->input());

        return redirect()->route('categories.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('categories.index');
    }
}
