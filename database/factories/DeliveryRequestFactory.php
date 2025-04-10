<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryRequest>
 */
class DeliveryRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pickup_address' => $this->faker->address,
            'pickup_name' => $this->faker->name,
            'pickup_contact_no' => '0123456789',
            'pickup_email' => $this->faker->safeEmail,
            'delivery_address' => $this->faker->address,
            'delivery_name' => $this->faker->name,
            'delivery_contact_no' => '0987654321',
            'delivery_email' => $this->faker->safeEmail,
            'type_of_good' => 'Document',
            'delivery_provider' => 'DHL',
            'priority' => 'Standard',
            'shipment_pickup_date' => now()->format('Y-m-d'),
            'shipment_pickup_time' => '10:00',
            'package_description' => 'Sample Box',
            'length' => 10,
            'height' => 5,
            'width' => 3,
            'weight' => 2,
            'status' => 'Pending',
        ];
    }

}
