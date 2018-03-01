<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsSetsTable extends Migration
{
    /**
     * @var string
     */
    public $tableName = 'sets';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tableName)) return;

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->integer('song_id')->unsigned()->nullable();
            $table->integer('set_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('song_id')->references('id')
                ->on('songs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('set_id')->references('id')
                ->on('set_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
