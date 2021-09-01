<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     protected $fillable = [
        'division_id', 'name', 'name_bn', 'slug',
    ];
}
