<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
      'num_room',
      'title',
      'bed',
      'bathroom',
      'mq',
      'img',
      'flat_id'
    ];


    public function flat() {

        return $this->belongsTo(Flat::class);
    }
}
