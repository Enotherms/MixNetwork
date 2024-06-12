<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImagePathFromCarouselImages extends Migration
{
    public function up()
    {
        Schema::table('carousel_images', function (Blueprint $table) {
            $table->dropColumn('image_path');  // Remove the image_path column
        });
    }

    public function down()
    {
        Schema::table('carousel_images', function (Blueprint $table) {
            $table->string('image_path');  // Re-add the image_path column if needed
        });
    }
}
