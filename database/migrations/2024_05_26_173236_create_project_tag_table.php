<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTagTable extends Migration
{
    public function up()
    {
        Schema::create('project_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_list_id')->constrained('project_list')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
}
