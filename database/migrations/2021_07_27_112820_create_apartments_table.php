<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')
                ->references('id')
                ->on('houses')
                ->onDelete('cascade');
            $table->unsignedBigInteger('entrance_id');
            $table->foreign('entrance_id')
                ->references('id')
                ->on('entrances')
                ->onDelete('cascade');
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')
                ->references('id')
                ->on('floors')
                ->onDelete('cascade');
            $table->string('name');
            $table->integer('number');
            $table->double('square');
            $table->integer('price');
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('apartments');
    }
}
