<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    use HasFactory;

    protected $fillable = ['division', 'district', 'upazila'];

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
