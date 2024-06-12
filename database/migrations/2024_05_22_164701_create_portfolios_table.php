<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id'); // Ensure this is an auto-incrementing primary key
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('project_list')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
