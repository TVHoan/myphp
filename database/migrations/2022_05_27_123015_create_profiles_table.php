<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('fullname')->nullable();
            $table->date('dob')->nullable();
            $table-> integer('age')->nullable();
            $table->timestamps();
            $table->text('job')->nullable();
            $table->longText('school')->nullable();
            $table->longText('des')->nullable();
            $table->longText('contact')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('country_id')
            ->constrained('countries')
            ->nullOnDelete()
            ->nullable();            
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
