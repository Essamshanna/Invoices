<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan make:migration add_description_to_types_of_restrictions_table
     */
    public function up(): void
    {
        Schema::table('types_of_restrictions', function (Blueprint $table) {
            $table->text('description')->nullable()->after('typeOfRestr_ename');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('types_of_restrictions', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
