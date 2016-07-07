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
    protected $fillable = ['first_name', 'middle_name','surname','email', 'tel','truck_type','truck_manufacture_date','truck_model','truck_maker','truck_tons','truck_plate','truck_plate_state','truck_suspend'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['truck_password'];

    /**
     * Get the data for the truck.
     */
    public function data()
    {
        return $this->hasMany('App\TruckData','truck_id');
    }
}
