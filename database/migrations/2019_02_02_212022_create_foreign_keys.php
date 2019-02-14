<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table){
            $table->foreign('phase_id')
                ->references('id')
                ->on('phases')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('files', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('investments', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('emails', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('payments', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('expirations', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('products', function(Blueprint $table){
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('products_projects', function(Blueprint $table){
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('developers_projects', function(Blueprint $table){
            $table->foreign('developer_id')
                ->references('id')
                ->on('developers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('services', function(Blueprint $table){
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('services_projects', function(Blueprint $table){
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('databases', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('tasks', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('budgets', function(Blueprint $table){
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('state_id')
                ->references('id')
                ->on('states_budgets')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('contacts_projects', function(Blueprint $table){
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
        Schema::table('contacts_customers', function(Blueprint $table){
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
