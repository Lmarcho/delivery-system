<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('delivery_requests', function (Blueprint $table) {
            $table->id();

            // Pickup Info
            $table->string('pickup_address');
            $table->string('pickup_name');
            $table->string('pickup_contact_no');
            $table->string('pickup_email')->nullable();

            // Delivery Info
            $table->string('delivery_address');
            $table->string('delivery_name');
            $table->string('delivery_contact_no');
            $table->string('delivery_email')->nullable();

            // Shipment Info
            $table->enum('type_of_good', ['Document', 'Parcel']);
            $table->enum('delivery_provider', ['DHL', 'STARTRACK', 'ZOOM2U', 'TGE']);
            $table->enum('priority', ['Standard', 'Express', 'Immediate']);
            $table->date('shipment_pickup_date');
            $table->time('shipment_pickup_time');

            // Package Info
            $table->string('package_description');
            $table->float('length');
            $table->float('height');
            $table->float('width');
            $table->float('weight');

            // Status
            $table->enum('status', ['Pending', 'Cancelled', 'Processed', 'Shipped'])->default('Pending');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_requests');
    }
};
