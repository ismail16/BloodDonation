<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name', 'name_bn', 'slug',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\District');
    }

    public function district(){
        return $this->hasMany('App\Models\District');
    }

    public function tahana(){
        return $this->hasMany('App\Models\Thana');
    }
}
