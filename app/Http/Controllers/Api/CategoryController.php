<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function get_categories()
    {
        $categories = Category::whereNull('category_id')
                ->with('childrenCategories')
                ->get();

        return response()->json(['message'=>'Category lists','data'=>$categories],200);                
    }
}
