<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    protected $fillable = ['workout_plan_id','workout_name','time','calories','workout_level','workout_periods','image','video'];
}
