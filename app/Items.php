<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{   
    protected $guarded = [];
    public function serviceOffer(){
        return $this.belongsTo(service_offers::class,'orderId');
    }
}
