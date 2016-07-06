<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckData extends Model
{

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['truck_id','truck-speed','truck-lat','truck-lng','truck-active'];

    /**
	 * Get the truck that owns the data.
	 */
	public function truck()
	{
	    return $this->belongsTo('App\Truck', 'truck-id');
	}

}
