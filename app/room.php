<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availableRoom extends Model
{

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
    protected $_table;
protected $primaryKey;


public function __construct(array $attributes = [])
{
    $this->_table = $this->table = 'room';
    $this->primaryKey = $this->_table . 'ID';

}

}
