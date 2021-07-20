<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Upazila;
use App\Models\PlacePic;

class Place extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // public function users()
    // {
    //     $this->hasMany(User::class);
    // }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

    /**
     * Get the pitures for the blog post.
     */
    public function placePics()
    {
        return $this->hasMany(PlacePic::class);
    }

    // public function upazila()
    // {
    //     return $this->belongsTo(Upazila::class);
    // }
}
