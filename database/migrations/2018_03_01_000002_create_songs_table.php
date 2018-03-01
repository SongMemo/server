<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /** @var string */
    public $tableName = 'songs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tableName)) return;

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('key_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('text')->nullable();
            $table->timestamps();
        });

        Schema::table($this->tableName, function (Blueprint $table) {
            $table->foreign('key_id')
                ->references('id')
                ->on('keys')
                ->onUpdate('cascade')
                ->onDelete('set null');
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
