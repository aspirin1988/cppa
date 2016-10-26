<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateImageGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_galleries', function (Blueprint $table) {
            $table->string('path_small');
            $table->string('path_middle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_galleries', function (Blueprint $table) {
            $table->dropColumn('path_small');
            $table->dropColumn('path_middle');
        });
    }
}
