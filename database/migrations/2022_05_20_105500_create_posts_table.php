<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\category;
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->string('slug')->unique();
            $table->integer('view_number')->nullable();
            $table->string('image')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('content')->nullable();
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onDelete('cascade')
                    ->nullable();
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onDelete('cascade')
                    ->nullable();
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
        Schema::dropIfExists('posts');
    }
}
