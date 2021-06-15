<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenant_id');
            $table->string('familyName');
            $table->string('description')->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            $table->integer('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->enum('active', ['Y','N'])->default('Y');

            $table->timestamps();

            $table->foreign('tenant_id')
                  ->references('id')
                  ->on('tenants')
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
        Schema::dropIfExists('families');
    }
}
