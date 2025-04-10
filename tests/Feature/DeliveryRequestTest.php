<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\DeliveryRequest;

class DeliveryRequestTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function it_creates_a_delivery_request_successfully()
    {
        $response = $this->post('/delivery-request', [
            'pickup_address' => '123 Pickup St',
            'pickup_name' => 'John',
            'pickup_contact_no' => '1234567890',
            'pickup_email' => 'john@example.com',
            'delivery_address' => '456 Delivery Rd',
            'delivery_name' => 'Doe',
            'delivery_contact_no' => '0987654321',
            'delivery_email' => 'doe@example.com',
            'type_of_good' => 'Document',
            'delivery_provider' => 'DHL',
            'priority' => 'Standard',
            'shipment_pickup_date' => now()->format('Y-m-d'),
            'shipment_pickup_time' => '10:00',
            'package_description' => 'Books',
            'length' => 10,
            'height' => 5,
            'width' => 3,
            'weight' => 2,
        ]);

        $response->assertRedirect('/delivery-request/create');
        $this->assertDatabaseHas('delivery_requests', [
            'pickup_name' => 'John',
            'delivery_name' => 'Doe',
        ]);
    }

    /** @test */
    public function it_shows_validation_errors_on_missing_fields()
    {
        $response = $this->post('/delivery-request', []);
        $response->assertSessionHasErrors([
            'pickup_address',
            'pickup_name',
            'pickup_contact_no',
            'delivery_address',
            'delivery_name',
            'delivery_contact_no',
            'type_of_good',
            'delivery_provider',
            'priority',
            'shipment_pickup_date',
            'shipment_pickup_time',
            'package_description',
            'length',
            'height',
            'width',
            'weight',
        ]);
    }

    /** @test */
    public function it_can_cancel_a_pending_delivery_request()
    {
        $delivery = DeliveryRequest::factory()->create([
            'status' => 'Pending',
        ]);

        $response = $this->post('/delivery-request/' . $delivery->id . '/cancel');
        $response->assertRedirect();
        $this->assertEquals('Cancelled', $delivery->fresh()->status);
    }

    /** @test */
    public function it_cannot_cancel_if_status_is_not_pending()
    {
        $delivery = DeliveryRequest::factory()->create([
            'status' => 'Shipped',
        ]);

        $response = $this->post('/delivery-request/' . $delivery->id . '/cancel');
        $response->assertRedirect();
        $response->assertSessionHas('error');
        $this->assertEquals('Shipped', $delivery->fresh()->status);
    }
}

