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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->float('p1')->nullable();
            $table->float('p2')->nullable();
            $table->float('p3')->nullable();
            $table->float('promedio')->nullable();
            $table->float('calificacion_final')->nullable();
            $table->smallInteger('tipo_evaluacion')->nullable();
            $table->string('course_id');
            $table->string('student_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
