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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('nid_number')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('salary')->nullable();
            $table->string('job_type')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('closeing_date')->nullable();

            $table->string('image')->nullable();
            $table->longText('document')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
