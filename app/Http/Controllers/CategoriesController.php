<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.categories.index')->with('categories',Category::all());

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name'=>$request->name,
        ]);

         session()->flash('success','Category Created SucessFully');
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.index')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        //
           $category->name = $request->name;
           $category->save();
           session()->flash('success','Motherfucker Category Update SucessFully');
           return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::withTrashed()->where('id',$id)->first();

        if($category->trashed()){
           $category->forceDelete();
        }else{
            if($category->posts->count()>0) {
                session()->flash('error', 'Categories is Associated With Some Post.Eror');
                return redirect()->back();
            }
            $category->delete();
        }

        session()->flash('success','Category  Deleted SucessFully');
        return redirect()->back();
    }

    public function trashed(){
        $category = Category::onlyTrashed()->get();
        return view('admin.categories.index')->with('categories',$category);
    }

    public function restore($id){
        $category = Category::onlyTrashed()->where('id',$id)->first();
        $category->restore();
        session()->flash('success','Category Restored SuccesFull');
        return redirect(route('categories.index'));
    }




}
