<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberHistory extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsToMany(Member::class, 'member_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }
}
