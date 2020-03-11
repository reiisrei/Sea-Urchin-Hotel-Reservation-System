<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomAsset extends Model
{
  protected $primaryKey = 'roomAssetID';
  public function availableRoom()
  {
      return $this->hasOne('App\availableRoom');
  }
  public function asset()
  {
      return $this->hasOne('App\asset');
  }
}
