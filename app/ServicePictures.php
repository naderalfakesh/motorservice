<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePictures extends Model
{
    public function  service(){

        return $this->belongsTo(service::class,'serviceId');
    }
}
