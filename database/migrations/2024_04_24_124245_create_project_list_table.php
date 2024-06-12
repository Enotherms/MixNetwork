<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectListTable extends Migration
{
    public function up()
    {
        Schema::create('project_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('date');
            $table->longText('image')->nullable(); // Store image as base64
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_list');
    }
}
