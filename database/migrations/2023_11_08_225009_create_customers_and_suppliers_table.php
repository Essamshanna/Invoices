<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers_and_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('C_Name');
            $table->Integer('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('add_people')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->Integer('links_id')->unsigned();
            $table->foreign('links_id')->references('id')->on('add_links')->onDelete('cascade')->onUpdate('cascade');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('Tax_Nu');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_and_suppliers');
    }
};
