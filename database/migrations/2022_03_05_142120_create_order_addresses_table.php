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
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->boolean('facturation')->default(false);
            $table->boolean('professionnal')->default(false);
            $table->enum('civility', ['M','Mme'])->nullable();
            $table->string('name', 100)->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('address', 100);
            $table->string('addressbis', 100)->nullable();
            $table->string('bp', 100)->nullable();
            $table->string('postal', 100);
            $table->string('city', 100);
            $table->string('phone', 100);
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('order_addresses');
    }
};
