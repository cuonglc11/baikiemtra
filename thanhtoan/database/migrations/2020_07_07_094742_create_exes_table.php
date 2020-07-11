<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exes', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->timestamps();
            $table->string('email');
            $table->float('price');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('update_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exes');
    }
}
