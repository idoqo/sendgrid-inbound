<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id");
            $table->string("email");
            $table->mediumText("body");
            $table->timestamps();

            $table->foreign("post_id")
                ->references("id")
                ->on("posts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}
