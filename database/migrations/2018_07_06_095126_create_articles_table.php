<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('title')->unique();
            $table->string('subtitle')->unique();
            $table->text('content');
            $table->integer('page_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
