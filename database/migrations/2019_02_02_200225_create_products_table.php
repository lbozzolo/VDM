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

            $table->string('name')->nullable();
            $table->string('fee')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('ip_class')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('port')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('direct_admin')->nullable();
            $table->string('backbone_shared')->nullable();
            $table->string('so')->nullable();
            $table->string('additional_bandwidth')->nullable();
            $table->string('admin_access')->nullable();
            $table->string('storage_backup')->nullable();
            $table->string('type')->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();

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
