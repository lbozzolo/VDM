<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('fee')->nullable();
            $table->string('period')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('phase_id')->nullable()->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->index('id');
            $table->index('phase_id');
            $table->index('customer_id');
            $table->index('owner_id');
            $table->index('user_id');

            $table->softDeletes();
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
        Schema::dropIfExists('projects');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
