<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $primaryKey = 'paymentID';
   protected $fillable = ['clientID', 'paymentMethod', 'invoiceNum', 'accountName', 'amountPaid', 'datePaid', 'payment_image', 'comments'];
  public function booking()
  {
      return $this->belongsTo('App\booking');
  }
  public function client()
  {
      return $this->belongsTo('App\client');
  }
}
