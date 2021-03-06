<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name','surname','email', 'tel','password','suspended'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role)
    {
        return $this->roles->contains('name',$role);
    }

    public function addRole($role)
    {
        $this->roles()->attach($role);
    }

    public function romoveRole($role)
    {
        $this->roles()->detach($role);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isDriver()
    {
        return $this->hasRole('driver');
    }

    public function isClient()
    {
        return $this->hasRole('client');
    }

    /**
     * Get the user's full name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFullNameAttribute()
    {
        return ucfirst($this->attributes['first_name'] .' '. $this->attributes['surname']);
    }

     /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user')->withTimestamps();
    }

    /**
     * The trucks that belong to the user.
     */
    public function trucks()
    {
        return $this->hasMany('App\Truck');
    }

    static public function drivers()
    {
        return static::with('roles')->get()->filter(function ($value, $key) {
    		return $value->isDriver();
		});
    }
}
