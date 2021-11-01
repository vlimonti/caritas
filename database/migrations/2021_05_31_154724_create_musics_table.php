<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenant_id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('author')->required();
            $table->string('url');
            $table->string('tone');
            $table->string('music_link')->nullable();
            $table->string('archive')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')
                  ->references('id')
                  ->on('tenants')
                  ->onDelete('cascade');
        });

        Schema::create('category_music', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('music_id');

            $table->foreign('category_id')
                            ->references('id')
                            ->on('categories')
                            ->onDelete('cascade');
            
            $table->foreign('music_id')
                            ->references('id')
                            ->on('musics')
                            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_music');
        Schema::dropIfExists('musics');
    }
}
