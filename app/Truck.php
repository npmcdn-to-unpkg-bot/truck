<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'tel','truck-type','truck-model','truck-maker','truck-tons','truck-plate','truck-number'];

    /**
     * Get the data for the truck.
     */
    public function data()
    {
        return $this->hasMany('App\TruckData');
    }
}
