<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use App\Models\category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::paginate(3);
        
        return view('post.list',['post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        $category =  category::all();
        //
        return view('post.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepostRequest $request)
    {
                // $request->validate([

        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ]);
        $post = new post;
        
    
    try {
        $post->title=$request->title;
        $post->slug =Str::slug($request->slug,'-');
        $post->summary =$request->summary;
        // $imageName = url("/image") . "/" . $post->id . ".jpg";  
        // $request->image->move(public_path('images'), $imageName);
        
        $post->image =$this->storeImage($request);
  

        /* Store $imageName name in DATABASE from HERE */

        if(Auth::check())
        {        
            $post->user_id =Auth::id();
        }
        else
        {
            $post->user_id = 1;
        }
        
        $post->content =$request->content;
        $post->category_id =$request->category_id;
        $post->save();
    } catch (Throwable $th) {
return redirect()->back()->withErrors($th)->withInput();    
}
       

return  redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response(redirect(url('/')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curentpost =   post::find($id);
        $category =  category::all();
        
        return view('post.update',['post'=>$curentpost,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostRequest  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepostRequest $request,post $post)
    {   
        
         
        $post = post::find($post->id);
         try {
            $post->title=$request->title;
            $post->slug =$request->slug;
            $post->summary =$request->summary;
            if(isset($request->image)==true)
            {
                $post->image =$this->updateImage($request);

            }
            
          
            $post->content =$request->content;
            $post->category_id =$request->category_id;
            $post->save();
         } catch (Throwable $th) 
         {    return  redirect('post/'.$post->id.'/'.'edit');  
         }

        return  redirect('post');
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $item = post::find($post->id);

        $item->delete();
        return  redirect('post');
    }

    protected function storeImage(StorepostRequest $request) {
        $path = $request->file('image')->store('public/image');

        return substr($path, strlen('public/'));
      }
      protected function updateImage(UpdatepostRequest $request) {
        $path = $request->file('image')->store('public/image');

        return substr($path, strlen('public/'));
      }
}
