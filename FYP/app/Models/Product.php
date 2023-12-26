<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'name', 'type', 'price', 'image', 'description', 'condition', 'status'];
    public $timestamps = false;

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }
}