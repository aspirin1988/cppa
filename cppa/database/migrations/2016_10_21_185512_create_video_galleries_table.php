<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('alt');
            $table->text('description');

            $table->string('parent_type');
            $table->string('parent_id');
            $table->boolean('visible');

            $table->string('url');

            $table->string('user_upload');
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
        Schema::dropIfExists('video_galleries');
    }
}
