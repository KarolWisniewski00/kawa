<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextColumnsToOrderItems extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->text('attributes_name')->after('quantity');
            $table->text('attributes_grind')->after('attributes_name');
        });
    }

    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['attributes_name', 'attributes_grind']);
        });
    }
}

