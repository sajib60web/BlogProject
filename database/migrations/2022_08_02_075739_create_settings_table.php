<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name', 100);
            $table->string('app_logo')->nullable();
            $table->string('app_favicon')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->float('discount_rate')->default(10);
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
        Schema::dropIfExists('settings');
    }
}
