<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\category;
use App\Http\Resources\postCollection;


class PostPublic extends Controller
{
    public function list()
    {
        // $post = post::all();
        // $post[0]['category']= category::find($post[0]['category_id']);
        // return  response()->json($post, 200);
        $post = post::all();
        return (new postCollection($post));

    }
    public function detail($slug)
    { try{
        $post = post::where('slug',$slug)->first();
        if(empty($post))
        {
            return  redirect('/');
        }
    }
        catch( Throwable $e)
        {
            return  redirect('/');

        }
        return view('post.show',['post'=>$post]);
    }
}
