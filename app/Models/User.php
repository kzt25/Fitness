<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,HasRoles, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function member_histories()
    // {
    //     return $this->hasMany(MemberHistory::class);
    // }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_histories');
    }


//   public function member()
//   {
//       return $this->hasOne(User::class);
//   }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
