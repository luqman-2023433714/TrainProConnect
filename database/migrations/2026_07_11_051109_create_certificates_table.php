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
        Schema::create('certificates', function (Blueprint $table) {

            $table->id();

            $table->string('certificate_no')->unique();

            $table->foreignId('enrollment_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('issue_date');

            $table->enum('status',[
                'Draft',
                'Issued',
                'Revoked'
            ])->default('Draft');

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
        Schema::dropIfExists('certificates');
    }
};