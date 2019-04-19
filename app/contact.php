<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public function serviceOffer(){
        return $this->hasMany(service_offers::class,'authorizedPersonId');
    }

    public function company(){
        return $this->belongsTo(company::class,'company_id');
    }
}
