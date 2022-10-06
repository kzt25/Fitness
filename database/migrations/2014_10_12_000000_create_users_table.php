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
            $table->string('current_member_type')->nullable();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('personal_choice_id')->nullable();
            $table->integer('profile_id')->nullable();
            $table->integer('chat_id')->nullable();
            $table->integer('message_id')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('member_code')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->integer('age')->nullable();
            $table->string('bmi')->nullable();
            $table->string('gender')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->boolean('active_status')->nullable();

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
