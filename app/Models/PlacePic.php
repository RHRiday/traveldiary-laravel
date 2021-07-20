<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Place;

class PlacePic extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $guarded = ['id'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
