<?php

use App\Models\User;
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
    Schema::create('listings', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(User::class, 'owner_user_id');
      $table->timestamps();
      $table->string('title');
      $table->longText('description');
      $table->string('company');
      $table->string('email');
      $table->string('logo')->nullable();
      $table->enum('location_type', ['on-site', 'remote', 'hybrid']);
      $table->string('location')->nullable();
      $table->date('close_date')->nullable(); // when the job listing will automatically become closed 
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('listings');
  }
};
