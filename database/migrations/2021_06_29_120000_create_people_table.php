<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenant_id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('lastname');
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', ['married', 'single', 'widowed', 'divorced', 'other'])->nullable();
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('street')->nullable();
            $table->integer('house_number')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('active', ['Y','N'])->default('Y');
            $table->timestamps();

            $table->foreign('tenant_id')
                  ->references('id')
                  ->on('tenants')
                  ->onDelete('cascade');
        });

        Schema::create('person_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('team_id');
            
            $table->foreign('person_id')
                            ->references('id')
                            ->on('people')
                            ->onDelete('cascade');

            $table->foreign('team_id')
                            ->references('id')
                            ->on('team')
                            ->onDelete('cascade');
        });

        Schema::create('person_skill', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('skill_id');

            $table->foreign('person_id')
                            ->references('id')
                            ->on('people')
                            ->onDelete('cascade');
                            
            $table->foreign('skill_id')
                            ->references('id')
                            ->on('skills')
                            ->onDelete('cascade');
        });

        Schema::create('ministry_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ministry_id');
            $table->unsignedBigInteger('person_id');

            $table->foreign('ministry_id')
                            ->references('id')
                            ->on('ministries')
                            ->onDelete('cascade');
            
            $table->foreign('person_id')
                            ->references('id')
                            ->on('people')
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
        Schema::dropIfExists('ministry_person');
        Schema::dropIfExists('person_skill');
        Schema::dropIfExists('person_team');
        Schema::dropIfExists('people');
    }
}
