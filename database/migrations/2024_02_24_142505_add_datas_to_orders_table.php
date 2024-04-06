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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('post_invoice')->nullable();
            $table->string('adres_invoice')->nullable();
            $table->string('adres_extra_invoice')->nullable();
            $table->string('city_invoice')->nullable();
            $table->string('name_recive')->nullable();
            $table->string('email_recive')->nullable();
            $table->string('phone_recive')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('post_invoice');
            $table->dropColumn('adres_invoice');
            $table->dropColumn('adres_extra_invoice');
            $table->dropColumn('city_invoice');
            $table->dropColumn('name_recive');
            $table->dropColumn('email_recive');
            $table->dropColumn('phone_recive');
        });
    }
};
