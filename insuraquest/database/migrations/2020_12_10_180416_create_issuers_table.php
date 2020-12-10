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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('value');
        });
        DB::table('issuers')->insert(array(
            array('name' => 'eu', 'value' => 'EU'),  
            array('name' => 'be', 'value' => 'BE'),
            array('name' => 'vlaamsgewest', 'value' => 'Vlaams Gewest'),
            array('name' => 'waalsgewest', 'value' => 'Waals Gewest'),
                        
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
