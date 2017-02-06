<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'verified','name','organiser','address','date','fees','picture','description','contactNumber','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function competitors(){
        return $this->hasMany('App\Competitors');
    }
}
