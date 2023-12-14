<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'description', 'startDate', 'startTime', 'endDate', 'endTime','status', 'venue', 'type', 'eventImage', 'floorPlan'];

    public $timestamps = false;

    public function organizer()
    {
        return $this->belongsTo(User::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function crews()
    {
        return $this->hasMany(Crew::class);
    }
}
