<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trail_details', function (Blueprint $table) {
            $table->id();
            $table->string('difficulty');
            $table->string('elevation');
            $table->string('elevation_rating');
            $table->string('distance');
            $table->string('distance_rating');
            $table->string('estimated_time');

            $table->foreignId('trail_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trail_details');
    }
};
