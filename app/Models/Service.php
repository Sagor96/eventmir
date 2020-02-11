<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable = [
  's_name', 's_amount',
];

//Many to many
public function clients(){
return $this->hasMany(Client::class);
}

}
