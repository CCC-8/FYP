<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventVenue extends Model
{
    protected $fillable = ['event_id', 'venue_id', 'floor_plan'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
