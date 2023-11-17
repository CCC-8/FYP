<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'contactNo', 'password', 'user_type']; 
    public $timestamps = false;

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function crewApplications()
    {
        return $this->hasMany(Crew::class);
    }

    public function dealer()
    {
        return $this->hasOne(Dealer::class);
    }
}
