<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
  protected $primaryKey = 'clientID';
   protected $fillable = ['fullNmae', 'firstName', 'lastName', 'phoneNumber', 'emailAddress'];
  public function booking()
  {
      return $this->hasMany('App\booking' , 'clientID');
  }
  public function payment()
  {
      return $this->hasOne('App\payment', 'paymentID');
  }
}
