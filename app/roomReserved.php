<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomReserved extends Model
{
  protected $primaryKey = null;
public $incrementing = false;
  // protected $primaryKey = 'roomReservedID';
  protected $fillable = ['reservationID', 'roomID'];
  public function reservation()
  {
      return $this->hasOne('App\reservation');
  }
}
