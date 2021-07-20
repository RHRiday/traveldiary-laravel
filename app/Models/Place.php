<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Upazila;

class Place extends Model
{
    use HasFactory;

    // protected $gu = ['name', 'location', 'type', 'checkpoint', 'budget', 'descrip'];

    protected $guarded = ['id'];
    // public function users()
    // {
    //     $this->hasMany(User::class);
    // }

    public function posts()
    {
        $this->hasMany(Post::class);
    }

    public function upazila()
    {
        $this->belongsTo(Upazila::class);
    }
}
