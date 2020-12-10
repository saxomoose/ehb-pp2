<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateIssuersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
        });
        DB::table('issuers')->insert(array(
            array('name' => 'eu', 'value' => 'EU'),  
            array('name' => 'be', 'value' => 'BE'),
            array('name' => 'vlaamsgewest', 'value' => 'Vlaams Gewest'),
            array('name' => 'waalsgewest', 'value' => 'Waals Gewest'),
            array('name' => 'brusselshoofdstedelijkgewest', 'value' => 'Brussels Hoofdstedelijk Gewest'),
            array('name' => 'grondwettelijkhof', 'value' => 'Grondwettelijk Hof'),
            array('name' => 'hofvancassatie', 'value' => 'Hof van Cassatie'),
            array('name' => 'raadvanstate', 'value' => 'Raad van State'),
            array('name' => 'hofvanberoep', 'value' => 'Hof van Beroep'),
            array('name' => 'arbeidshof', 'value' => 'Arbeidshof'),
            array('name' => 'rechtbankvaneersteaanleg', 'value' => 'Rechtbank van eerste aanleg'),
            array('name' => 'arbeidsrechtbank', 'value' => 'Arbeidsrechtbank'),
            array('name' => 'ondernemingsrechtbank', 'value' => 'Ondernemingsrechtbank'),
            array('name' => 'politierechtbank', 'value' => 'Politierechtbank'), 
            array('name' => 'vredegerecht', 'value' => 'Vredegerecht')
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
        Schema::dropIfExists('issuers');
    }
}
