<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('');
            $table->integer('test_id');
            $table->string('slug')->default('');
            $table->text('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('by_date')->default(false);
            $table->date('date_end');
            $table->boolean('public')->default(false);
            $table->string('meta_title')->default('');
            $table->string('meta_description')->default('');
            $table->string('meta_custom')->default('');
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
        Schema::dropIfExists('course_posts');
    }
}
