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
        Schema::table('Order', function (Blueprint $table) {
            $table->string('stripe_payment_intent')->nullable()->after('quantity');
        });
    }


    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            
        });
    }
};
