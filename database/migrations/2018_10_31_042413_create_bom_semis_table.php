<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBomSemisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bom_semis');
        Schema::create('bom_semis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_id');
            $table->string('supplier_id');
            $table->string('model');
            // $table->string('fiscal_year');

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
        Schema::dropIfExists('bom_semis');
    }
}
