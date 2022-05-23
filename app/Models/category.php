<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;
use \Illuminate\Database\Eloquent\Relations\HasMany;


class category extends Model
{
    use HasFactory;
/**
 * Get all of the comments for the category
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function post(): HasMany
{
    return $this->hasMany(post::class);
}
    
}
