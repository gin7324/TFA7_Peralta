<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_creation_requires_required_fields(): void
    {
        $response = $this->post('/customers', [
            'full_name' => '',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['full_name', 'email']);
    }

    public function test_customer_account_can_be_created_and_updated(): void
    {
        $createResponse = $this->post('/customers', [
            'full_name' => 'Ava Stone',
            'email' => 'ava@example.com',
        ]);

        $createResponse->assertRedirect('/customers');
        $this->assertDatabaseHas('customers', [
            'full_name' => 'Ava Stone',
            'email' => 'ava@example.com',
        ]);

        $customer = Customer::first();

        $updateResponse = $this->put('/customers/' . $customer->id, [
            'full_name' => 'Ava Stone Updated',
            'email' => 'ava.updated@example.com',
        ]);

        $updateResponse->assertRedirect('/customers');
        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'full_name' => 'Ava Stone Updated',
            'email' => 'ava.updated@example.com',
        ]);
    }
}
