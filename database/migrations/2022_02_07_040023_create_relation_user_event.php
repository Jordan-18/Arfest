<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationUserEvent extends Migration
{
    public function up()
    {
        Schema::create('relation_user_events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('point_id')->nullable();
            $table->bigInteger('event_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relation_user_event');
    }
}
