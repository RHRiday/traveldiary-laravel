<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    use HasFactory;
    public $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
