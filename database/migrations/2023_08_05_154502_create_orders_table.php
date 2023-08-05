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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('nip')->nullable();
            $table->string('post');
            $table->string('adres');
            $table->string('adres_extra')->nullable();
            $table->string('city');
            $table->string('phone');
            $table->string('status')->default('Oczekujący na płatność');;
            $table->decimal('total', 10, 2);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
