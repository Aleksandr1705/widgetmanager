<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetboardWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgetboard_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('widgetboard_id');
            $table->integer('widget_id');
            $table->integer('col');
            $table->integer('position');
            
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
        Schema::dropIfExists('widgetboard_widgets');
    }
}
