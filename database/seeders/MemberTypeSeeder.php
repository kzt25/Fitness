<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
        'user_id'=>1,
        'member_type' =>'Platinum',
        'member_type_level' => 'Beginner',
        'price'=>5000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Platinum',
        'member_type_level' => 'Advance',
        'price'=>5000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Platinum',
        'member_type_level' => 'Professional',
        'price'=>5000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Gold',
        'member_type_level' => 'Beginner',
        'price'=>20000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Gold',
        'member_type_level' => 'Advance',
        'price'=>20000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Gold',
        'member_type_level' => 'Professional',
        'price'=>20000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Diamond',
        'member_type_level' => 'Beginner',
        'price'=>40000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Diamond',
        'member_type_level' => 'Advance',
        'price'=>40000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Diamond',
        'member_type_level' => 'Professional',
        'price'=>40000
       ]);
       Member::create([
        'user_id'=>1,
        'member_type' =>'Ruby',
        'member_type_level' => 'Beginner',
        'price'=>100000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Ruby',
        'member_type_level' => 'Advance',
        'price'=>100000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Ruby',
        'member_type_level' => 'Professional',
        'price'=>100000
       ]);
       Member::create([
        'user_id'=>1,
        'member_type' =>'Ruby Premium',
        'member_type_level' => 'Beginner',
        'price'=>200000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Ruby Premium',
        'member_type_level' => 'Advance',
        'price'=>200000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Ruby Premium',
        'member_type_level' => 'Professional',
        'price'=>200000
       ]);

       Member::create([
        'user_id'=>1,
        'member_type' =>'Free',
        'member_type_level' => '',
        'price'=>0
       ]);

    }
}
