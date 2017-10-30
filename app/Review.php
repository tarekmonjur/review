<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function software()
    {
        return $this->belongsTo('App\Software');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
}
