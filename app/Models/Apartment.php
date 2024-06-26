<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['house_id', 'entrance_id', 'floor_id', 'name', 'number', 'square', 'price', 'status'];

    public $timestamps = false;

    public function soldHouse()
    {
        return $this->hasOne(SoldHouse::class);
    }
}
