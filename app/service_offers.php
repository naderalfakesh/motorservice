<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_offers extends Model
{
    public function service(){
        return $this->belongsTo(service::class,'service_id');
    }
    public function authorizedPerson(){
        return $this->belongsTo(contact::class,'authorizedPersonId');
    }


}
