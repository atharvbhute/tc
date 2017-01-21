<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitors extends Model
{
    protected $fillable=[
      'name','email','contactNumber','clgName','event_id'
    ];
}
