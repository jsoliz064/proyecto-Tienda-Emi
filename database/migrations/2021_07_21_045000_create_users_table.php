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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('idPersonal')->unique()->nullable();
            $table->unsignedBigInteger('idRol')->nullable();  
            
            $table->foreign('idPersonal')
                  ->references('id')
                  ->on('personals')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            
            //---------------------------------------------------------------                
            $table->foreign('idRol')
                  ->references('role_id')
                  ->on('model_has_roles')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            //---------------------------------------------------------------                
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
