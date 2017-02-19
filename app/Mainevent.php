<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainevent extends Model
{
    protected $fillable = ['user_id','name','organiser','picture'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
