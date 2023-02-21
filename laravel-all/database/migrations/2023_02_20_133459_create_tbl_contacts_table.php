<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("uname", 255)->default('')->nullable();
            $table->string("email", 50)->default('')->nullable();
            $table->string("subject", 255)->default('')->nullable();
            $table->text("message")->default('')->nullable();
            $table->enum("page", ['home','contact'])->default('contact');
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
        Schema::dropIfExists('tbl_contacts');
    }
}
