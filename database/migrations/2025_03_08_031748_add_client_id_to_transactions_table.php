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
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id'); // Add client_id column
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['client_id']); // Drop foreign key constraint
            $table->dropColumn('client_id'); // Drop client_id column
        });
    }
};
