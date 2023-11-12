<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * أنواع القيود
     */
    public function up(): void
    {
        Schema::create('types_of_restrictions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeOfRestr_aname');
            $table->string('typeOfRestr_ename');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_of_restrictions');
    }
};
