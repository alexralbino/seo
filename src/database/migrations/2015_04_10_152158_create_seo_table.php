<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title', 85);
            $table->text('description');
            $table->string('keywords', 55);
            $table->integer('modullable_id')->unsigned();
            $table->string('modullable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seo');
    }
}