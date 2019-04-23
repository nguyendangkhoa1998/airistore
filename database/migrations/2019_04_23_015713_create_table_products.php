<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('categories_child_id');
            $table->string('name');
            $table->string('symbolic_image')->nullable();
            $table->integer('unit_price')->default(0);
            $table->integer('quantity')->default(1);
            $table->text('short_desciption')->nullable();
            $table->text('desciption')->nullable();
            $table->float('stars')->default(0);
            $table->integer('views')->default(1);
            $table->tinyInteger('is_new')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
