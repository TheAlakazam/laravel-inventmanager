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
            $table->bigInteger('Item_ID');
            $table->foreign('Item_ID')->references('id')->on('items');
            $table->string('Item_Description');
            $table->bigInteger('Borrower_ID');
            $table->bigInteger('Quantity');
            $table->date('Issue_Date');
            $table->date('Return_Date')->nullable();
            $table->string('Reason')->default("");
            $table->bigInteger('Issuer_ID')->unsigned();
            $table->foreign('Issuer_ID')->references('id')->on('users');
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
