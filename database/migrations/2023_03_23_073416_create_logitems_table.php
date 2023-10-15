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
        if (Schema::hasTable('logitems')) {
            return;
        }

        Schema::create('logitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logitemtype');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('datatable', 100)->nullable();
            $table->integer('record')->nullable();
            $table->timestamp('eventdatetime')->index('logitem__eventdatetime_index');
            $table->string('remoteaddress', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['datatable', 'eventdatetime'], 'logitem_datatable_event_datetime_index');
            $table->index(['logitemtype', 'id'], 'logitem_logitemtype_id_id_index');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logitems');
    }
};
