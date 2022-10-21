<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingGroup extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class,'training_groups')
                    ->withPivot(['group_id','user_id'])
                    ->withTimestamps();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
