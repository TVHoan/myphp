<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Models\category;
use App\Models\post;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::paginate(10);
        return view('category.list',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        $category = new category;
        
    
        try {
            $category->name=$request->name;
            $category->slug =Str::slug($request->slug,'-');
            
            $category->save();
        } catch (Throwable $th) {
    return redirect()->back()->withErrors($th)->withInput();    
         }
            
            return view('category.show',['category'=>$category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        $post = post::where('category_id',$category->id)->paginate(10);
        if(empty($post ))
        {
            return redirect('/category');
        }
        return view('category.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =   category::find($id);
       
        
        return view('category.form',['category'=>$category]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        $category = category::find($category->id);
        try {
           $category->name=$request->name;
           $category->slug =$request->slug;
           $category->save();
        } catch (Throwable $th) 
        {   
             return  redirect('category/'.$category->id.'/'.'edit');  
        }

       return  redirect('category');
       }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $item = category::find($category->id);

        $item->delete();
        return  redirect('category');
    }
}
