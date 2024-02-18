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
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('content_photo_1')->nullable();
            $table->string('content_photo_2')->nullable();
            $table->longText('content_text_1')->nullable();
            $table->longText('content_text_2')->nullable();
            $table->longText('content_text_3')->nullable();
            $table->longText('content_text_4')->nullable();
            $table->longText('content_text_5')->nullable();
            $table->longText('content_text_6')->nullable();
            $table->longText('content_text_7')->nullable();
            $table->longText('content_text_8')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('content_photo_1');
            $table->dropColumn('content_photo_2');
            $table->dropColumn('content_text_1');
            $table->dropColumn('content_text_2');
            $table->dropColumn('content_text_3');
            $table->dropColumn('content_text_4');
            $table->dropColumn('content_text_5');
            $table->dropColumn('content_text_6');
            $table->dropColumn('content_text_7');
            $table->dropColumn('content_text_8');
            $table->dropColumn('type');
        });
    }
};
