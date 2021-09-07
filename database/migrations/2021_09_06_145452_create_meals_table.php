<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements(' id ');
            $table->timestamps();
            $table->string(' name ');
            $table->string(' photo ');
            $table->text(' description ');
            $table->unsignedInteger(' quantity_instock ');
            $table->double(' buy_price ',8,3 )->unsigned();
            $table->double(' sale_price ', 8, 3 )->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
