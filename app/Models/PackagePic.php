<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
