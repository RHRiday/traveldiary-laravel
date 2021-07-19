<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $name = "Foo Bar";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Gets all the post by a user
     * 
     * @returns array of collections
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * This method creates a unique username for a user
     * 
     * @returns string
     */
    public function setUsername($name)
    {
        $brokenName = explode(' ', strtolower($name)); //rifat hossen

        if (User::where('username', $brokenName[0])->count() < 1) { //rifat does not exist
            return $brokenName[0];
        } //first name is the username

        elseif (User::where('username', end($brokenName))->count() < 1) {
            return end($brokenName);
        } //last name is the username

        elseif (User::where('username', Str::slug($name, '_'))->count() < 1) { //rifat_hossen does not exist
            return Str::slug($name, '_');
        } //slug of whole name is username

        else {
            for ($c = 0; $c <= User::all()->count(); $c++) {
                if (User::where('username', $brokenName[0] . $c . mt_rand(1, 30))->exists() === false) {
                    $username = $brokenName[0] . $c . mt_rand(1, 30);
                    break;
                }
            }
            return $username;
        } //first name + random number + maximum corresponding id is the username
    }
    
}
