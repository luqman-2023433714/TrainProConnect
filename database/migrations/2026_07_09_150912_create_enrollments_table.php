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
        Schema::create('enrollments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('participant_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('training_class_id')
                  ->constrained('training_classes')
                  ->cascadeOnDelete();

            $table->date('enrollment_date');

            $table->string('attendance_status')
                  ->default('Pending');

            $table->string('completion_status')
                  ->default('Ongoing');

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
        Schema::dropIfExists('enrollments');
    }
};