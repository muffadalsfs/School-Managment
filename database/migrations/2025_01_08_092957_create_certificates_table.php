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
    $table->string('name')->default('Unnamed Certificate'); // Default value
    $table->text('description');
    $table->boolean('is_active')->default(1)->index(); // Corrected default spelling
    $table->string('certificated_image')->nullable();
    $table->timestamps();
});

          Schema::create('certificate_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('certificate_id')->constrained('certificates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
         Schema::dropIfExists('certificate_student');
    }
};
