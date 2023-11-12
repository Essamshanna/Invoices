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
        Schema::create('tree_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acc_id');
            $table->integer('acc_parent_no');
            $table->string('acc_aname');
            $table->string('acc_ename');
            // $table->boolean('acc_nature_id')->default(true);  // The nature of the account is either  debit or credit  true رئيسي --false فرعي
            $table->Integer('acc_type_id')->unsigned();
            $table->foreign('acc_type_id')->references('id')->on('acc_typees')->onDelete('cascade')->onUpdate('cascade');
            // $table->boolean('acc_nature_id')->default(true);  // The nature of the account is either  debit or credit  true مدين --false داين
            $table->Integer('acc_nature_id')->unsigned();
            $table->foreign('acc_nature_id')->references('id')->on('nature_accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('acc_report_id')->unsigned();
            $table->foreign('acc_report_id')->references('id')->on('acc_reports')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('acc_level');
            $table->decimal('acc_debit',9,3);
            $table->decimal('acc_credit',9,3);
            $table->decimal('acc_balance',9,3);
            $table->boolean('accountStatus')->default(false);   //The account is closed. The account is open. true = open & False = closed
            $table->bigInteger('accountCurrency')->unsigned();  // عملة الحساب
            // $table->foreign('acc_report_id')->references('id')->on('acc_reports')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tree_accounts');
    }
};
