<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLyricsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('lyrics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('song_id');
            $table->text('lyrics');
            $table->timestamps();

            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('lyrics');
    }

}
