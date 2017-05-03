<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->nullable()->default(null); // Optional Contact
            $table->integer('user_id')->unsigned();
            $table->integer('assigned_to')->nullable()->default(null);
            $table->string('subject');
            $table->integer('state_id')->default(1);  // Default state: New
            $table->integer('priority')->default(2); // Default priority: Low
            $table->text('summary')->nullable();
            $table->timestamps();
            $table->dateTime('closed_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
