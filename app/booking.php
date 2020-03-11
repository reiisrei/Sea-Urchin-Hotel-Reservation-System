<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $primaryKey = 'bookingID';
   protected $fillable = ['clientID', 'checkInDate', 'checkOutDate', 'roomsCount', 'roomTypeID', 'adultsCount', 'childrenCount', 'amenityID', 'paymentID'];
    //public $incrementing = false;
    public function reservation()
    {
        return $this->belongsTo('App\reservation','reservationID');
    }
    public function client()
    {
        return $this->belongsTo('App\client','clientID');
    }
    public function payment()
    {
        return $this->belongsTo('App\payment','paymentID');
    }
    public function amenities()
    {
        return $this->belongsTo('App\amenities','amenityID');
    }
    public function roomType()
    {
        return $this->belongsTo('App\roomType','roomTypeID');
    }
}
