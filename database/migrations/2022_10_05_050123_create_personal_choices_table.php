<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_choices', function (Blueprint $table) {
            $table->id();
            $table->string('activities');
            $table->string('goal');
            $table->string('physical_limation');
            $table->string('body_type');
            $table->string('energy_level');
            $table->string('daliy_life');
            $table->string('ideal_weight');
            $table->string('physical_activity');
            $table->string('most_attention_areas');
            $table->string('diet_type');
            $table->string('average_night');
            $table->string('bad_habits');
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
        Schema::dropIfExists('personal_choices');
    }
}
