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
            'member_type' =>'Free',
            'price'=>0
           ]);
           
        Member::create([
        'member_type' =>'Platinum',
        'duration'=>1,
        'price'=>5000
       ]);

       Member::create([
        'member_type' =>'Gold',
        'duration'=>1,
        'price'=>20000
       ]);

       Member::create([
        'member_type' =>'Diamond',
        'duration'=>1,
        'price'=>40000
       ]);

       Member::create([
        'member_type' =>'Ruby',
        'duration'=>1,
        'price'=>100000
       ]);

       Member::create([
        'member_type' =>'Ruby Premium',
        'duration'=>1,
        'price'=>200000
       ]);

    }
}
