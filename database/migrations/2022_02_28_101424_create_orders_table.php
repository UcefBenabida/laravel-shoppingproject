<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('reference', 8);
            $table->decimal('shipping');
            $table->decimal('total');
            $table->decimal('tax');
            $table->enum('payment', [
                'carte',
                'mandat', 
                'virement', 
                'cheque'
            ]);
            $table->string('purchase_order', 100)->nullable();
            $table->boolean('pick')->default(false);
            $table->integer('invoice_id')->nullable();
            $table->string('invoice_number', 40)->nullable();
            $table->foreignId('state_id')->unsigned();
            $table->foreignId('user_id')->unsigned();
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
};
