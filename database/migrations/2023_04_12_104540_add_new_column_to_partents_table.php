<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partents', function (Blueprint $table) {
            $table->string("country");
            $table->text("phone");
            $table->foreignId('admin_id')->contstrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partents', function (Blueprint $table) {
            $table->dropColumn("country");
            $table->dropColumn("phone");
            $table->dropColumn('admin_id')->contstrained();
        });
    }
};
