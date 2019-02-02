<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('name');
            $table->string('fee');
            $table->string('ip');
            $table->string('username');
            $table->string('password');
            $table->string('port');
            $table->integer('supplier_id')->unsigned();

            $table->index('id');
            $table->index('supplier_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::dropIfExists('products');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
