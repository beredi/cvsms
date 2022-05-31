<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("companies", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("street")->nullable();
            $table->string("street_number")->nullable();
            $table->string("zip")->nullable();
            $table->string("city")->nullable();
            $table->string("email")->nullable();
            $table->string("pib")->nullable();
            $table->string("unique_number")->nullable();
            $table->string("bank_account")->nullable();
            $table->boolean("is_company_app_owner")->default(false);
            $table->string("logo")->nullable();
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
        Schema::dropIfExists("companies");
    }
}