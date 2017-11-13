<?php

namespace App\Http\Controllers;

use App\Category;
use App\Resource;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Get category listings/resources.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category  = Category::findOrFail($id);
        $resources = Resource::with('category', 'basePrice', 'acquiredFeatures', 'address')
            ->whereCategoryId($id)
            ->orderby('created_at', 'desc')
            ->paginate(9);

        return view('frontend.listings.list', compact('resources', 'category'));
    }
}
