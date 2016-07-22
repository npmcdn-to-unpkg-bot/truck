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

    /**
     *
     * get all trucks that the driver is active.
     *
     */
    static public function active()
    {
        $truck = new static;
        $trucks = $truck::with(['data'])->get();
        // $trucks = $truck::with(['data' => function ($query) {
        //     $query->where('active', '=', 1);
        //
        // }])->get();

        $trucks = $trucks->filter(function ($value, $key) {
    		return !$value->data()->get()->last()->active;
		});

        return $trucks;
    }

    public function getCurrentDriverAttribute()
    {
        return User::find($this->attributes['current_driver_id']);
    }

    // public function getFullNameAttribute()
    // {
    //     return $this->driver()->surname . " " . $this->driver()->middle_name . " " .$this->driver()->first_name;
    // }

    public function getDriverAttribute()
    {
        return User::find($this->attributes['user_id']);
    }
}
