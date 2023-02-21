<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSourceToTblContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_contacts', function (Blueprint $table) {
            $table->enum("source", ['google','facebook','youtube','twitter','instagram'])->default('google')->after('page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_contacts', function (Blueprint $table) {
            $table->dropColumn('source');
        });
    }
}
