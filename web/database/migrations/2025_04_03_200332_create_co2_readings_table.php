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
    Schema::create('co2_readings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('bus_id')->constrained()->onDelete('cascade');
        $table->date('reading_date');
        $table->time('reading_time')->nullable();
        $table->integer('avg_co2')->nullable();         // ppm
        $table->integer('peak_co2')->nullable();        // ppm
        $table->integer('min_co2')->nullable();         // ppm
        $table->integer('time_in_red_zone')->nullable(); // in minutes
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co2_readings');
    }
};
