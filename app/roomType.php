<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomType extends Model
{

    protected $primaryKey = 'roomTypeID';
    protected $fillable = ['title', 'nightRate', 'capacity', 'childrenAllowed', 'maxAdult', 'description'];
    public function availableRoom()
    {
        return $this->hasMany('App\availableRoom');
    }
    // public function booking()
    // {
    //     return $this->hasOne('App\booking');
    // }
    //
}
