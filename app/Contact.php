<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function admin(){
        return $this->belongsTo('App\User', 'admin_id', 'id');
    }

    public function details(){
        return $this->hasMany('App\Contact', 'parent_id', 'id');
    }

    public function latest(){
        return $this->hasOne('App\Contact', 'parent_id', 'id')->orderBy('id','desc');
    }
}
