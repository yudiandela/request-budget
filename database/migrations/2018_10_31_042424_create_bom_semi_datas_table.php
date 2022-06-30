<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBomSemiDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bom_semi_datas');
        Schema::create('bom_semi_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bom_semi_id');
            $table->string('part_id');
            $table->string('supplier_id');
            $table->string('source');
            $table->decimal('qty',8,2);
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
        Schema::dropIfExists('bom_semi_datas');
    }
}
