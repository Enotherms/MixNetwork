<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBase64ToCarouselImages extends Migration
{
    public function up()
    {
        Schema::table('carousel_images', function (Blueprint $table) {
            $table->longText('base64_image')->nullable(); // Add a column for base64 encoded images
        });
    }

    public function down()
    {
        Schema::table('carousel_images', function (Blueprint $table) {
            $table->dropColumn('base64_image');
        });
    }
}

