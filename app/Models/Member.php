<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table="members";

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    public function mealplan()
    {
        return $this->hasOne(MealPlan::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'member_histories');
    }


    public static function boot() {
        parent::boot();
        self::deleting(function($member) {
            $member->mealplan()->each(function($mealplan) {
                $mealplan->meal()->each(function($meal){
                    $meal->delete();
                });
                $mealplan->delete();
            });
        });
    }
}
