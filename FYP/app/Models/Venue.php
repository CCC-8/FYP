<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name', 'capacity', 'default_floor_plan'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
