<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\profileResource;
class userResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

    //     $users = array();
    // foreach ($this->resource as $user) {
    //     $users[] = array(
    //         // 'name' => $user->name,
    //         'profile' => new profileResource($user->profile),
    //     );
    // }
    // return $users;
    }
}
