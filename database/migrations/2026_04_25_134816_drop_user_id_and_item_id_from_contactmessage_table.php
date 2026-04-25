<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('ContactMessage', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'Item_id']);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down(): void
    {
        Schema::table('ContactMessage', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('Item_id')->nullable();
        });
    }
};