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
        Schema::table('users', function (Blueprint $table) {
            $table->string("country");
            $table->text("phone");
            $table->foreignId('admin_id')->contstrained();

            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->unsignedBigInteger('parent_id');
            $table->foreignId('parent_id')->references('id')->on('partents')->contstrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("country");
            $table->dropColumn("phone");
            $table->dropColumn('admin_id')->contstrained();
        });
    }
};
