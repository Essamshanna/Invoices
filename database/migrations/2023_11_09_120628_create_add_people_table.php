<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * أضافة أشخاص
     */
    public function up(): void
    {
        Schema::create('add_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('people_fname');
            $table->string('people_lname');
            $table->string('email')->nullable();
            $table->boolean('addedInEmails')->default(False);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_people');
    }
};
