<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('customer_name', 80);
            $table->char('customer_id_type', 5);
            $table->char('customer_id', 20);
            $table->char('customer_email', 120);
            $table->char('customer_mobile', 40);
            $table->char('status', 20)->nullable();
            $table->char('p2p_url', 20)->nullable();
            $table->char('request_Id', 20)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
