<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("invoice_items", function (Blueprint $table) {
            $table->increments("id");
            $table->string("class_name");
            $table->unsignedInteger("item_id");
            $table->unsignedInteger("invoice_id");
            $table
                ->foreign("invoice_id")
                ->references("id")
                ->on("invoices");
            $table->integer("pieces")->default(1);
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
        Schema::dropIfExists("invoice_items");
    }
}
