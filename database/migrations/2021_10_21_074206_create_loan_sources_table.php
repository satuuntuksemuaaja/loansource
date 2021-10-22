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
            $table->string('company', 100);
            $table->string('address');
            $table->string('phone', 16);
            $table->string('city', 100);
            $table->string('state_name', 100);
            $table->char('state_code', 2);
            $table->char('zipcode', 5);
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
