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
        // admin ou user
        $table->string('role')->default('user')->after('email'); 
        // 1 para ativo, 0 para inativo
        $table->boolean('active')->default(false)->after('role'); 
    });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
