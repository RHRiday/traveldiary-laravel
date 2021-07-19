<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Place extends Model
{
    use HasFactory;

    // public function users()
    // {
    //     $this->hasMany(User::class);
    // }

    public function posts()
    {
        $this->hasMany(Post::class);
    }
}
