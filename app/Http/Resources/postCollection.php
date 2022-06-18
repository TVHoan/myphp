<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\category;
use App\Models\User;
use App\Http\Resources\commentResource;
use App\Http\Resources\userResource;
class postCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
    //    return $data = parent::toArray($request);
 
        $posts = array();
    foreach ($this->resource as $post) {
        $posts[] = array(
            'id' => $post->id,
            'slug' => $post->slug,
            'title' => $post->title,
            'content' => $post -> content,
            'comments' => new commentResource($post->comments),
            'user' => user::find($post->user_id),
            'created_at' =>$post ->created_at,
            'category'=>category::find($post->category_id),
        );
    }
    return $posts;
    
    }
}
