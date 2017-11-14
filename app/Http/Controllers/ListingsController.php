<?php

namespace App\Http\Controllers;

use App\Feature;
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
    public function __invoke($id)
    {
        $category  = Category::findOrFail($id);
        $desc      = Feature::whereName(json_encode(['nameEn' => 'Description','nameAr' => 'الوصف']))->first();
        $resources = Resource::with('category', 'basePrice', 'acquiredFeatures', 'address')
            ->whereCategoryId($id)
            ->orderby('created_at', 'desc')
            ->paginate(9);

        return view('frontend.listings.grid', compact('resources', 'category', 'desc'));
    }
}
