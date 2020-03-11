<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availableRoom extends Model
{
    protected $primaryKey = 'roomID';

    protected $fillable = ['roomTypeID', 'roomDoorNum', 'isAvailable'];

    public function roomAmenity()
    {
        return $this->hasMany('App\roomAmenity');
    }
    public function roomType()
    {
        return $this->hasOne('App\roomType');
    }
    public function roomAsset()
    {
        return $this->hasMany('App\roomAsset');
    }
    public function reservation()
    {
        return $this->hasMany('App\reservation','roomID','roomID');
    }

}
