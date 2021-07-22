<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /** Generates the difference between current time
     * 
     * @params timestamp
     * 
     * @returns string
     */
    public static function time($time)
    {
        $diffInMin = floor((time() - strtotime($time)) / 60);
        if ($diffInMin < 1) {
            $diff = 'now';
        } if ($diffInMin > 0) {
            $diff = $diffInMin . ' m ago';
        } if ($diffInMin > 60) {
            $diff = floor($diffInMin / 60) . 'h ago';
        } if ($diffInMin > 1440) {
            $diff = floor($diffInMin / 1440) . 'd ago';
        }

        return $diff;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function postPics()
    {
        return $this->hasMany(PostPic::class);
    }
}
