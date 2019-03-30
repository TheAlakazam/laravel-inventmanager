<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IssueAndReturn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('Item ID');
            $table->foreign('Item ID')->references('id')->on('items');
            $table->string('Item Description');
            $table->bigInteger('Borrower ID');
            $table->bigInteger('Quantity');
            $table->date('Issue Date');
            $table->date('Return Date')->nullable();
            $table->string('Reason');
            $table->bigInteger('Issuer ID');
            $table->foreign('Issuer ID')->references('id')->on('users');
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
        Schema::dropIfExists('borrow');
    }
}
