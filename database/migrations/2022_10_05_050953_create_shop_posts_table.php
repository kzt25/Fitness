<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_member_id');
            $table->integer('ban_word_id');
            $table->longText('caption');
            $table->string('photos');
            $table->integer('viewers');
            $table->softDeletes();
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
        Schema::dropIfExists('shop_posts');
    }
}
