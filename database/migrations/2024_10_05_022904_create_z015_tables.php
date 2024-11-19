<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('companies', function (Blueprint $table) {
      $table->id();
      $table->string('name', 191);
      $table->string('code_name', 191);
      $table->string('description', 191);
      $table->string('bussiness_type', 191); // corporation, single prop, partenership, front
      $table->timestamps();
    });

    Schema::create('branches', function (Blueprint $table) {
      $table->id();
      $table->string('name', 191);
      $table->string('code_name', 191);
      $table->string('bussiness_name', 191);
      $table->text('address');
      $table->string('contact_number', 191);
      $table->string('tin_number', 191);
      $table->string('type', 191); // main, retail
      $table->unsignedBigInteger('company_id')->nullable();
      $table->timestamps();
    });

    Schema::create('employees', function (Blueprint $table) {
      $table->id();
      $table->string('name', 191);
      $table->string('code_name', 191);
      $table->text('address');
      $table->string('contact_number', 191);
      $table->timestamps();
    });

    Schema::create('items', function (Blueprint $table) {
      $table->id();
      $table->string('code_name', 191);
      $table->string('name', 191);
      $table->timestamps();
    });

    Schema::create('item_movements', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('quantity');
      $table->string('type', 50);
      $table->unsignedBigInteger('item_id')->nullable();
      $table->unsignedBigInteger('branch_id')->nullable();
      $table->timestamps();
    });

    Schema::create('costs', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('quantity');
      $table->bigInteger('amount');
      $table->boolean('with_vat')->default(0);
      $table->unsignedBigInteger('item_id')->nullable();
      $table->timestamps();
    });

    Schema::create('locations', function (Blueprint $table) {
      $table->id();
      $table->string('name',191);
      $table->boolean('is_active')->default(1);
      $table->unsignedBigInteger('branch_id')->nullable();
      $table->timestamps();
    });

    // pivot >>>>>>>>>>>>>>>>>>>>>>>>
    Schema::create('item_location', function (Blueprint $table) {
      $table->unsignedBigInteger('item_id');
      $table->unsignedBigInteger('location_id');
      $table->timestamps();
      $table->primary(['item_id','location_id']);
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('companies');
    Schema::dropIfExists('branches');
    Schema::dropIfExists('employees');
    Schema::dropIfExists('items');
    Schema::dropIfExists('item_movements');
    Schema::dropIfExists('costs');
    Schema::dropIfExists('locations');
    //pivot
    Schema::dropIfExists('item_location');
  }
};


// name // description
// code  // partnumber
// cost_id // current cost
// category_id // food, motorparts, accountable form, appliances
// class_id  // classification: accessories, tires, tubes, oil
// sub_class_id // 
// status_id // super seded, damage, sold, susppen exipire