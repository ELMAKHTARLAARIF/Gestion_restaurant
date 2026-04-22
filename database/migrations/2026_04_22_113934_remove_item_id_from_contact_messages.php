<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ContactMessage', function (Blueprint $table) {


            $table->dropForeign(['Item_id']);

            $table->dropColumn('Item_id');
        });
    }

    public function down(): void
    {
        Schema::table('ContactMessage', function (Blueprint $table) {

            $table->unsignedBigInteger('Item_id')->nullable();

            $table->foreign('Item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
    }
};