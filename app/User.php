<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function division()
    {
      return $this->belongsTo('App\Models\Division');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function thana()
    {
        return $this->belongsTo('App\Models\Thana');
    }


    protected $fillable = [
        'name', 'phone', 'email', 'gender','blood_group', 'date_of_birth', 'division', 'district', 'thana', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
