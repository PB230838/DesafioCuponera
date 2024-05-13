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
            $table->string('photo')->default('images/default.png');
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('empresa_id')->nullable(); 
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas'); // Definimos la relación con la tabla empresas y cómo se manejará la eliminación de la empresa relacionada
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
