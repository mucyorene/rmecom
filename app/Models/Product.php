<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->hasOne('App\Models\Categories','id','category_id');
    }
}
