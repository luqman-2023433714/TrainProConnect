<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {

            $table->id();

            $table->string('participant_name');
            $table->string('ic_passport')->unique();
            $table->string('email')->unique();
            $table->string('phone',20);
            $table->string('company');
            $table->string('status')->default('Active');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};