<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_placements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('college_placement_id')->comment('Reference to student placement table id');
            $table->integer('student_id')->comment('Reference to student table id');
            $table->enum('is_selected',['0','1'])->comment('0->Not selected, 1->selected')->nullable();
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
        Schema::dropIfExists('student_placements');
    }
}
