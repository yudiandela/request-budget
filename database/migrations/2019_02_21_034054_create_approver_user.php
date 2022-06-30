<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApproverUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('approver_users');
		Schema::create('approver_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('approval_master_id');
            $table->integer('approval_detail_id');
            $table->integer('user_id');
            $table->boolean('is_approve')->default(0);
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
        Schema::dropIfExists('approver_users');
    }
}
