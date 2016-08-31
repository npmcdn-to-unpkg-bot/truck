<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleData extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['vehicle_id','speed','lat','lng','active'];

   /**
    * Get the truck that owns the data.
    */
   public function truck()
   {
       return $this->belongsTo('App\Vehicle', 'truck_id');
   }
}
