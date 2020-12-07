<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('complaint_id');
            $table->string('title', 150);
            $table->string('text', 3000);
            $table->unsignedBigInteger('client_id');
            $table->boolean('in_work');
            $table->timestamps();

            $table->foreign('client_id', 'FK_client_id')
                ->references('client_id')
                ->on('clients')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
