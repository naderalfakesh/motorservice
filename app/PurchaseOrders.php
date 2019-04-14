<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrders extends Model
{
    public function company(){
        return $this->belongsTo('App\companies');
    }
}
