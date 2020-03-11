<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
  protected $primaryKey = 'reservationID';
  //  protected  $fillable=['checkindate','checkoutdate','n_rooms','n_nights','n_adult','n_children','room_type','amenities'];
 protected $fillable = ['reservationDate', 'expiryDate', 'paymentReceived', 'status', 'actualCheckIn', 'actualCheckOut', 'roomReservedID'];
  public function booking()
  {
      return $this->hasOne('App\booking','bookingID');
  }
  public function roomReserved()
  {
      return $this->hasMany('App\roomReserved');
  }
  public function availableRoom()
  {
      return $this->hasMany('App\availableRoom');
  }
  protected $_table;




}
