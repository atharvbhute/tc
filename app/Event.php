<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'verified','name','organiser','address','date','fees','picture','first','second','third','description','contactNumber','user_id'
    ];

    public function user(){
       return $this->belongsTo('App\User');
    }

    public function competitors(){
       return $this->hasMany('App\Competitors');
    }
}
