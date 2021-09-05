<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $fillable = [
        'name', 'name_bn', 'slug',
    ];
    
    public function user()
    {
        return $this->hasOne('App\Models\District');
    }

    public function division(){
        return $this->belongsTo('App\Models\Division');
    }

    public function district(){
        return $this->belongsTo('App\Models\District');
    }
}
