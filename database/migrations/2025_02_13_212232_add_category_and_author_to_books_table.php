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
        Schema::table('books', function (Blueprint $table) {
            $table->string('slug')->unique()->after('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('author')->default('Desconocido')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('author');
            $table->dropColumn('slug');
        });
    }
};
