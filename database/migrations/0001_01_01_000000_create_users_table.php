<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Convention Laravel, ou 'nom' si tu préfères mais adapte ton code !
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('password');
            $table->string('role')->default('client'); // 'client' ou 'admin'
            $table->boolean('status')->default(true); // actif par défaut
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
