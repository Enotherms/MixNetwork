<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioImagesTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained('portfolios')->onDelete('cascade');
            $table->longText('image'); // Store image as base64
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_images');
    }
}
