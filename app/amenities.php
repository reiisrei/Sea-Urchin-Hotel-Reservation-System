<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class amenities extends Model
{
    protected $primaryKey = 'amenityID';
   protected $fillable = ['title', 'description', 'amount'];
  public function booking()
  {
      return $this->hasMany('App\booking');
  }
  public function roomAmenity()
  {
      return $this->hasMany('App\roomAmenity');
  }
}
