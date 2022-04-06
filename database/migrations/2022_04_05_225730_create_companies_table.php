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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // auto-incrementing unsigned BIGINT primary key https://laravel.com/docs/9.x/migrations#column-method-id
            $table->string('name', 100); // most columns are required(i.e. NOT NULL) by default in laravel
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB'; // InnoDB is the default storage engine since MySQL 5.5(2010), and this project was created with MySQL 5.7.31, so this is not needed, i just added it for learning purposes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
