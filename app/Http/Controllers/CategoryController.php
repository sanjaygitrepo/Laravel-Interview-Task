<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::whereNull('category_id'))
            ->addColumn('action', 'category-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $categoryId = $request->id;
 
        $category   =   Category::updateOrCreate(
                    [
                     'id' => $categoryId
                    ],
                    [
                    'name' => $request->name
                    ]);    
                         
        return Response()->json($category);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Response()->json($category);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return Response()->json($category);
        
    }

    public function subcategory($id)
    {
        if(request()->ajax()) {
            return datatables()->of(Category::where('category_id',$id))
            ->addColumn('action', 'subcategory-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $category = Category::find($id);
        return view('subcategories',compact('id','category'));
    }

    public function addSubcategory(Request $request)
    {
        $categoryId = $request->id;
 
        $category   =   Category::updateOrCreate(
                    [
                     'id' => $categoryId
                    ],
                    [
                    'name' => $request->name,
                    'category_id' => $request->parent_id,
                    ]);    
                         
        return Response()->json($category);
    }
}
