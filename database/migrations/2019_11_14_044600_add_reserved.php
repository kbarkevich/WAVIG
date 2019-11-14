<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReserved extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('word_combo', function($table) {
            $table->string('reserved_by')->nullable();
            $table->boolean('is_reserved')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('word_combo', function($table) {
            $table->dropColumn('reserved_by');
            $table->dropColumn('is_reserved');
        });
    }
}
