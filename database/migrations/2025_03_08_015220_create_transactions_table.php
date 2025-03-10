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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('previous_payment_date')->nullable(); // Previous payment date
            $table->decimal('previous_payment_amount', 10, 2)->nullable(); // Previous payment amount
            $table->date('next_payment_date')->nullable(); // Next payment date
            $table->decimal('next_payment_amount', 10, 2)->nullable(); // Next payment amount
            $table->text('remarks')->nullable(); // Remarks
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
