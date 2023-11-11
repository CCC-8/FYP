<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }
}