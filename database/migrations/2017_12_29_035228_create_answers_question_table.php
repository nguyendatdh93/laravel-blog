<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_quesiton', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('answer_id');
            $table->integer('question_id');
            $table->integer('question_choice_id');
            $table->text('text');
            $table->tinyInteger('del_flg');
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
        Schema::dropIfExists('answers_quesiton');
    }
}
