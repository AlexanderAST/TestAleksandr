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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('responsibleUserId');
            $table->integer('groupId');
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->timestamps();
            $table->integer('accountId');
            $table->integer('pipelineId');
            $table->integer('statusId');
            $table->integer('closedAt')->nullable();
            $table->integer('closestTaskAt')->nullable();
            $table->integer('price');
            $table->integer('lossReasonId')->nullable();
            $table->string('lossReason')->nullable();
            $table->boolean('isDeleted');
            $table->string('tags')->nullable();
            $table->integer('companyId');
        });
    }


    public function down()
    {
        Schema::dropIfExists('deals');
    }
};
