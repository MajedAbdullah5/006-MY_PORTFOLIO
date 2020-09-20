<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitorsModel extends Model
{
   public $table =  'visitors';
   public $primaryKey ='id';
   public $incrementing = true;
   public $keyType ='int';
   public $timestamps ='false';
}
