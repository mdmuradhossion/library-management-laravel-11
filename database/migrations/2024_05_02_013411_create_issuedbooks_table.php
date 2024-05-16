<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuedbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuedbooks', function (Blueprint $table) {
            $table->id();
            $table->integer('bookId');
            $table->integer('studentID');
            $table->dateTime('issuesDate');
            $table->dateTime('returnDate')->nullable();;
            $table->integer('retrunStatus')->default('0');
            $table->integer('fine')->nullable();;
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
        Schema::dropIfExists('issuedbookdetails');
    }
}
