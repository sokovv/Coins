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
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rank');
            $table->string('symbol');
            $table->string('slug');
            $table->boolean('is_active');
            $table->string('first_historical_date');
            $table->string('last_historical_date');
            $table->timestamps();
            $table->json('platform')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};
