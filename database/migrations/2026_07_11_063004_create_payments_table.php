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
        Schema::create('payments', function (Blueprint $table) {

            $table->id();

            // Auto Generated Payment Number
            $table->string('payment_no')->unique();

            // Link to Enrollment
            $table->foreignId('enrollment_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Payment Amount
            $table->decimal('amount', 10, 2);

            // Payment Method
            
            $table->enum('payment_method', [
                'FPX',
                'Credit / Debit Card',
                'TNG eWallet',
                'DuitNow QR',
                'Bank Transfer',
                'Cash'
            ]);
            
          

            // Payment Workflow Status
            $table->enum('payment_status', [
                'Pending Payment',
                'Payment Submitted',
                'Payment Verified',
                'Payment Rejected',
                'Refunded'
            ])->default('Pending Payment');

            // Bank / Gateway Reference
            $table->string('transaction_reference')
                  ->nullable();

            // Payment Date
            $table->date('payment_date')
                  ->nullable();

            // Admin Verification
            $table->string('verified_by')
                  ->nullable();

            $table->dateTime('verified_at')
                  ->nullable();

            // Remarks
            $table->text('remarks')
                  ->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};