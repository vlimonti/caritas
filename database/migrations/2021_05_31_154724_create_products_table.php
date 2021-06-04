<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenant_id');
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->double('price', 10, 2);
            $table->text('description');
            $table->timestamps();

            $table->foreign('tenant_id')
                  ->references('id')
                  ->on('tenants')
                  ->onDelete('cascade');
        });

        Schema::create('basket_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('basket_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('basket_id')
                            ->references('id')
                            ->on('baskets')
                            ->onDelete('cascade');
            
            $table->foreign('product_id')
                            ->references('id')
                            ->on('products')
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
        Schema::dropIfExists('products');
    }
}
