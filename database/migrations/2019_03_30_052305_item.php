<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('Item_Description');
            $table->bigInteger('Stock');
            $table->integer('Purchased')->default(0);
            $table->integer('Issued')->default(0);
            $table->integer('Returned')->default(0);
            $table->bigInteger('Current_Stock')->virtualAs('Stock + Purchased - Issued + Returned');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
