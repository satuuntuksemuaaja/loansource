<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_sources', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->char('state', 2);
            $table->string('state_name', 100);
            $table->char('zipcode', 5);
            $table->string('address');
            $table->string('phone', 16);
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
        Schema::dropIfExists('loan_sources');
    }
}
