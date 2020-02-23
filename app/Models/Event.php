<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
  'e_name',
  'type_id',
  'venue_id',
  'e_date',
];
    //Many to many
      public function type(){
    	   return $this->belongsTo(Type::class);
       }
    //Many to many
      public function venue(){
    	   return $this->belongsTo(Venue::class);
       }
}
