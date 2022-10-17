<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigInteger('id_comment', true);
            $table->integer('id_user')->index('comments_ix_id_user')
                ->comment('ID Юзера');
            $table->integer('id_movie')->index('comments_ix_id_movie')
                ->comment('ID Фильма');
            $table->string('text_comment')->comment('Текст комментария');
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
        Schema::dropIfExists('comments');
    }
}
