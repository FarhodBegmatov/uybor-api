<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'surname', 'phone_number'];

    public $timestamps = false;

    public function soldHouses()
    {
        return $this->hasOne(SoldHouse::class);
    }
}
