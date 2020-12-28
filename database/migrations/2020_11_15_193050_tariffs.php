<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tariffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('week_days');
        });

        \DB::table('tariffs')->insert([
            ['name' => 'Тариф нечетный', 'price' => '700', 'week_days' => '1,3,5'],
            ['name' => 'Тариф четный', 'price' => '650', 'week_days' => '2,4'],
            ['name' => 'Тариф выходной', 'price' => '900', 'week_days' => '6,7'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}
