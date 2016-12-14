<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->text('description');
            $table->text('display_name');

            $table->integer('version')->default(1);
            $table->integer('rating')->default(0);

            $table->boolean('quality_assurance')->default(false);

            $table->boolean('accounting')->default(false);
            $table->boolean('facility_management')->default(false);

            $table->boolean('cost_avoidance')->default(false);
            $table->boolean('compare_years')->default(false);

            $table->boolean('actual_bill')->default(false);
            $table->boolean('calendarized_bill')->default(false);
            $table->boolean('normalized_bill')->default(false);

            $table->boolean('line_detail')->default(false);

            $table->integer('pattern_id')->nullable();
            $table->integer('group_id');
            $table->integer('topic_id')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
