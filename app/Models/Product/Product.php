<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = array('available');

    public function getAvailableAttribute()
    {
      $available = $this->quantity - $this->consumed;
      return $available;
    }

    public function getTypeAttribute($value)
    {
      $rawType = [
        '1'=> ['id'=>'1','name'=>'Flor','css'=>'success'],
        '2'=> ['id'=>'2','name'=>'Extracto','css'=>'warning'],
        '3'=> ['id'=>'3','name'=>'Comestible','css'=>'danger'],
        '4'=> ['id'=>'4','name'=>'Accesorio','css'=>'primary'],
      ];
      return $rawType[$value];
    }
}
