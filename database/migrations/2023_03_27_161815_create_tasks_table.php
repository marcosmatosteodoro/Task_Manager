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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('activities_id');
            $table->enum('status', [0 /* Aguardando */, 1 /* Completo */, 2 /* Não feito */, 3 /* Atrasado */]);
            $table->timestamps();
            $table->foreign('activities_id')->references('id')->on('activities');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
