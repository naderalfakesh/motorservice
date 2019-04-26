<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public function company(){
        return $this->belongsTo(company::class,'company_id');
    }

    public function serviceOffer(){
        return $this->hasMany(service_offers::class,'contact_id');
    }
    
    public function serviceOrder(){
        return $this->hasMany(service_orders::class,'contact_id');
    }
    
}
