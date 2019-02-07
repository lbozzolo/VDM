<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fee');
            $table->string('payment_method');
            $table->string('model_file');
            $table->integer('project_id')->unsigned();
            $table->integer('state_id')->unsigned()->nullable();

            $table->index('id');
            $table->index('project_id');
            $table->index('state_id');

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
        Schema::dropIfExists('budgets');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
