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
        Schema::table('users', function (Blueprint $table) {
            // Avval role_id ustuniga bog'langan tashqi kalitni o'chirish
            $table->dropForeign(['role_id']);
            // Keyin role_id ustunini o'chirish
            $table->dropColumn('role_id');
            // Agar username ustuni mavjud bo'lsa, uni ham o'chiring
//            $table->dropColumn('username');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->foreignId('role_id')->constrained();
        });
    }
};
