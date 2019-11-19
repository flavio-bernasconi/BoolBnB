<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

  protected $fillable = [
      'price'


    ];

  public function flats() {


      return $this -> belongsToMany(Flat::class) -> withPivot('expiration',);

  }
}
