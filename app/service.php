<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $guarded = [];
    //get all companies
    public function company($role){
        if($role <> ''){ return $this->belongsToMany(company::class)->wherePivot('role',$role);}
        else {return $this->belongsToMany(company::class)->withPivot('role');}

    }
  
    //Get products of this service
    public function product(){
        return $this->belongsToMany(product::class);
    }
    //Get pictures
    public function picture(){
        return $this->hasMany(ServicePictures::class,'serviceId');
    }
    //Get envolved contacts
    public function contact($role){
        if($role <> ''){ return $this->belongsToMany(contact::class)->wherePivot('role',$role);}
        else {return $this->belongsToMany(contact::class);}

    }
    //Get offers
    public function offer(){
        return $this->hasMany(service_offers::class,'service_id');
    }


}
