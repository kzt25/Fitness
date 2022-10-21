<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingUser extends Model
{
    use HasFactory;

    public function group() {
        return $this->belongsTo(TrainingGroup::class,'group_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['user_id','training_group_id'];
}
