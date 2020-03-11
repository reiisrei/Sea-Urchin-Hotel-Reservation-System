<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomAmenity extends Model
{
  protected $primaryKey = 'roomAmenityID';
  public function amenities()
  {
      return $this->hasOne('App\amenities');
  }
  public function availableRoom()
  {
      return $this->hasOne('App\availableRoom');
  }
}
