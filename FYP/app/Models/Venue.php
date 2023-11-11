<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name', 'location', 'capacity'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
