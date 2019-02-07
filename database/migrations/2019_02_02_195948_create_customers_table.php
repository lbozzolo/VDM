<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('head')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cuit')->nullable();
            $table->string('cuil')->nullable();
            $table->text('remarks')->nullable();

            $table->index('id');

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
        Schema::dropIfExists('customers');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
