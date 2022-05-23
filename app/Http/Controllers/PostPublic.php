<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\category;

class PostPublic extends Controller
{
    public function list()
    {
        $post = post::paginate(3);
        return view('post.list',['post'=>$post]);

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
