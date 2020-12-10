<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
        });
        DB::table('categories')->insert(array(
            array('name' => 'wetgeving', 'value' => 'Wetgeving'),  
            array('name' => 'rechtspraak', 'value' => 'Rechtspraak'),
            array('name' => 'rechtsleer', 'value' => 'Rechtsleer')

         )
        ); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
