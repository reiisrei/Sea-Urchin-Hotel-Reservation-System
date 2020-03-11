<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
  protected $primaryKey = 'assetID';
  public function roomAsset()
  {
      return $this->hasMany('App\roomAsset');
  }
}
