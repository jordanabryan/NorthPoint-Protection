<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //
    public function getRouteKeyName(){
    	return 'slug';
    }
}
