<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id');
        $table->string('title');
        $table->string('status');
        $table->dateTime('deadline');
        $table->timestamps();

        // Добавляем внешний ключ для связи с клиентами
        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
