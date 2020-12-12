<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
        });
        DB::table('keywords')->insert(array(
            array('name' => 'auto', 'value' => 'Auto'),  
            array('name' => 'brand', 'value' => 'Brand'),
            array('name' => 'leven', 'value' => 'Leven'),
            array('name' => 'gezondheid', 'value' => 'Gezondheidszorg'),
            array('name' => 'rechtsbijstand', 'value' => 'Rechtsbijstand'),
            array('name' => 'annulatie', 'value' => 'Annulatie'),
            array('name' => 'bijstand', 'value' => 'Bijstand'),
            array('name' => 'nvt', 'value' => 'Niet van toepassing'),

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
        Schema::dropIfExists('keywords');
    }
}
