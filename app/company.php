<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    public function purchase_offer(){
        return $this->hasMany('App\purchase_offers');
    }

    public function purchase_order(){
        return $this->hasMany('App\purchase_order');
    }

    public function companyAddress(){
        return $this->hasMany(companyAddress::class , 'company_id');
    }

     public function insertAddress($address){
        return $this->companyAddress()->create($address);
     }
    
    
    public function service(){
        return $this->belongsToMany(service::class)->withPivot('role');
    }
    
    public function contact(){
        return $this->hasMany(contact::class,'company_id');
    }
    public function serviceOffer(){
        return $this->hasMany(service_offers::class,'company_id');
    }
    
    
    
}