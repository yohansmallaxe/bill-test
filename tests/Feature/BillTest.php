<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BillTest extends TestCase
{
    use RefreshDatabase;
    private $user;
    public function setUp(): void
    {
        parent::setUp();
        $this->user= User::factory()->create();

    }

    public function test_correct_bill_calculation()
    {
        $response = $this->actingAs($this->user)->post('api/bill', ['units' => 200]);
        $response->assertStatus(200);
        $response->assertExactJson(['used units' => 200, 'Bill' => "920.00"]);
    }

    public function test_bill_updates_correctly()
    {

        $this->user->bills()->create(['units' => 200, 'bill' => "920.00"]);
        $response = $this->actingAs($this->user)->put('api/bill/1', ['units' => 80]);
        $response->assertStatus(200);
        $response->assertExactJson(['used units' => 80, 'Bill' => "200.00"]);
    }
    public function test_all_bills_are_showing()
    {
        $this->user->bills()->create(['units' => 200, 'bill' => "920.00"]);
        $this->user->bills()->create(['units' => 280, 'bill' => "1,400.00"]);
        $response = $this->actingAs($this->user)->get('api/bills');
        $response->assertStatus(200);
        $response->assertJson(['Bill info' => [
             [
            "Units"=> 200,
            "Bill"=> "920.00",
        ],
        [
            "Units"=> 280,
            "Bill"=> "1,400.00",
        ]]]);
    }
}
