<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Bricks extends Model
{
    protected $table = 'bricks_ packages';
	 public $timestamps = false;


   public function tipos()
   {
     return $this->belongsTo('App\Brickstipes', 'tipo', 'id');

   }
}
