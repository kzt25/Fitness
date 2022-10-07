<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('member_code')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('ideal_weight')->nullable();
            $table->string('bad_habits')->nullable();
            $table->string('most_attention_areas')->nullable();
            $table->string('average_night')->nullable();
            $table->string('physical_activity')->nullable();
            $table->string('diet_type')->nullable();
            $table->string('daily_life')->nullable();
            $table->string('energy_level')->nullable();
            $table->string('body_type')->nullable();
            $table->string('physical_limitation')->nullable();
            $table->string('age')->nullable();
            $table->string('goal')->nullable();
            $table->string('activities')->nullable();
            $table->string('bmi')->nullable();
            $table->string('bfp')->nullable();
            $table->string('gender')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->boolean('active_status')->nullable();
            // $table->string('current_member_type')->nullable();
            // $table->string('member_type_level')->nullable();
            $table->string('currentmember_type');
            $table->string('membertype_level');

            $table->string('neck')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('shoulders')->nullable();
            $table->string('password');
            $table->integer('profile_id')->nullable();
            $table->integer('chat_id')->nullable();
            $table->integer('message_id')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
