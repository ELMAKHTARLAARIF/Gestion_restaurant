<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ContactMessage', function (Blueprint $table) {

            $table->dropForeign(['Order_id']);

            $table->dropColumn('Order_id');
        });
    }

    public function down(): void
    {
        Schema::table('ContactMessage', function (Blueprint $table) {

            // restore column
            $table->unsignedBigInteger('Order_id')->nullable();

            // restore foreign key
            $table->foreign('Order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }
};
