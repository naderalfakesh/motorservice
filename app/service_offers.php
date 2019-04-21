<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_offers extends Model
{   
    protected $guarded = [];
    public function service(){
        return $this->belongsTo(service::class,'service_id');
    }
    public function company(){
        return $this->belongsTo(company::class,'company_id');
    }
    public function authorizedPerson(){
        return $this->belongsTo(contact::class,'authorizedPersonId');
    }
    public function item(){
        return $this->hasMany(Items::class,'orderId');
    }



}
