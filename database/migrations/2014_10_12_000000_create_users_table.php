<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nrp')->unique();
            $table->string('role')->default("STAFF");
            $table->string('photo')->default("profile.png");
            $table->string('seksi')->nullable()->default("");
            $table->string('departemen')->nullable()->default("");
            $table->string('divisi')->nullable()->default("");
            $table->string('email');
            $table->string('password');
            $table->string('status')->nullable()->default("ENABLED");
            $table->string('updated_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
