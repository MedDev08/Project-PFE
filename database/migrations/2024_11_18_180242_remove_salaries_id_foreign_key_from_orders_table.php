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
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key constraint 
            $table->dropForeign(['salaries_id']); 
            // Drop the column 
            $table->dropColumn('salaries_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add the column back 
            $table->foreignId('salaries_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};
