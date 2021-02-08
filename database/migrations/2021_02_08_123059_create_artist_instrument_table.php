<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistInstrumentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('artist_instrument', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('artist_id');
            $table->uuid('instrument_id');
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('artist_instrument');
    }

}
