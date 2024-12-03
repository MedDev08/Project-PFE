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
        Schema::table('salaries', function (Blueprint $table) {
            // Drop the foreign key constraint 
            $table->dropForeign(['orders_id']); 
            // Drop the column 
            $table->dropColumn('orders_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salaries', function (Blueprint $table) {
            // Add the column back 
            $table->foreignId('orders_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};
