<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->tinyInteger('status');
            $table->decimal('value',20);
            
            // Fk_types_concepts
            $table->unsignedBigInteger('concepts_id');
            $table->foreign('concepts_id')
                ->references('id')
                ->on('types_concepts')
                ->onDelete('cascade');

            // Fk_Payroll
            $table->unsignedBigInteger('payroll_id');
            $table->foreign('payroll_id')
                ->references('id')
                ->on('payroll')
                ->onDelete('cascade');
                
            // Fk_types_concepts
            $table->unsignedBigInteger('accounting_seat_id');
            $table->foreign('accounting_seat_id')
                ->references('id')
                ->on('accounting_seat')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concepts');
    }
}
