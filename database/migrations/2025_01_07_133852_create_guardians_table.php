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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_name');
            $table->string('relation_type')->index();
            $table->timestamps();
        });
          Schema::create('guardian_student', function (Blueprint $table) {
            $table->id();
           
             $table->foreignId('students_id')->constrained()->cascadeOnDelete(); // Ensures cascading deletion
        $table->foreignId('guardian_id')->constrained()->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
        Schema::dropIfExists('guardian_student');
    }
};
