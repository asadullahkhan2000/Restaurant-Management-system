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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number'); // More descriptive
            $table->integer('number_of_guests'); // Integer instead of string
            $table->date('date'); // Use proper date type
            $table->time('time'); // Use proper time type
            $table->decimal('advance_payment', 10, 2)->default(0); // Decimal for currency
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Status tracking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
