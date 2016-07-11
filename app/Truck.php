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
    protected $fillable = ['driver_id','user_id','current_driver_id','manufacture_date','model','maker','tons','plate','plate_state','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Get the data for the truck.
     */
    public function data()
    {
        return $this->hasMany('App\TruckData','truck_id');
    }

    /**
     * get all drivers.
     */
    public function driver()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getCurrentDriverAttribute()
    {
        return User::find($this->attributes['current_driver_id']);
    }

    public function getDriverAttribute()
    {
        return User::find($this->attributes['user_id']);
    }
}
