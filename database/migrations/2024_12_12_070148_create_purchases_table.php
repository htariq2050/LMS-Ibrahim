<?php

use App\Traits\CommonColumns;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use CommonColumns;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('purchase_id')->unique(); // Unique identifier for the purchase
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Foreign Key for courses
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key for users
            $table->dateTime('purchase_date'); // Date and time of the purchase
            $table->decimal('amount_paid', 10, 2); // Amount paid for the course
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending'); // Payment status
            $this->addCommonColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
