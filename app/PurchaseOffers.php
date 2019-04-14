<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOffers extends Model
{
    public function company(){
        return $this->belongsTo('App\companies');
    }
}
 