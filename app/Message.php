<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'msg',
        'email',
        'flat_id'
    ];
    public function flat(){
        return $this -> belongsTo(Flat::class);
  }
}
