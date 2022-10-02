<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_result_pivot', function (Blueprint $table) {
            $table->unsignedBigInteger('result_id');

            $table->foreign('result_id', 'result_id_fk_773767')->references('id')->on('results')->onDelete('cascade');

            $table->unsignedBigInteger('question_id');

            $table->foreign('question_id', 'question_id_fk_773767')->references('id')->on('questions')->onDelete('cascade');

            $table->unsignedBigInteger('option_id');

            $table->foreign('option_id', 'option_id_fk_773767')->references('id')->on('options')->onDelete('cascade');

            $table->integer('points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_result_pivot');
    }
};
