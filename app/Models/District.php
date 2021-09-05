<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
   protected $fillable = [
      'division_id', 'name', 'name_bn', 'slug',
   ];

   public function user()
   {
      return $this->hasOne('App\Models\District');
   }

   public function division(){
      return $this->belongsTo('App\Models\Division');
   }

   public function tahana(){
      return $this->hasMany('App\Models\Thana');
   }
}
