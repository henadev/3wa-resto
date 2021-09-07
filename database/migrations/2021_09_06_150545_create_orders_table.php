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
            $table->bigIncrements(' id ');
            $table->double(' total_amount ' , 8, 2);
            $table->double(' tax_rate' , 5, 3)->default(20);
            $table->double(' tax_amount ' , 8, 2);
            $table->unsignedBigInteger(' user_id ');
            $table->timestamps(' time_complete ')->nullable();
            $table->timestamps();
            $table->foreign(' user_id ')->references(' id ')->on(' users ')->onDelete(' cascade ')->onUpdate(' cascade ');
            
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
