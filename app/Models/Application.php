<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function hire()
    {
        return $this->belongsTo(Hire::class);
    }
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}
