<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('phone');
            $table->string('email');
            $table->string('origin');
            $table->text('remarks');

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
        Schema::dropIfExists('developers');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
