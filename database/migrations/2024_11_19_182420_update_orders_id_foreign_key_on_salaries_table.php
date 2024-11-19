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
            // Drop the existing foreign key constraint 
            $table->dropForeign(['orders_id']); 
            // Modify the column to be nullable 
            $table->foreignId('orders_id')->nullable()->change(); 
            // Add the new foreign key constraint with onDelete('cascade') 
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('set null');
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
            // Drop the new foreign key constraint 
            $table->dropForeign(['orders_id']); 
            // Modify the column to be not nullable 
            $table->foreignId('orders_id')->nullable(false)->change(); 
            // Add the original foreign key constraint 
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('set null');
        });
    }
};
