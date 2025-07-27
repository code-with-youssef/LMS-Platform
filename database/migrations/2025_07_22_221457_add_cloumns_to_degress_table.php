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
        Schema::table('degrees', function (Blueprint $table) {
        $table->boolean('published')->default(false)->after('degree');
        $table->string('feedback')->after('published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('degrees', function (Blueprint $table) {
            //
        });
    }
};
