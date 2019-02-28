<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetBroadBandPriceTest extends TestCase
{
    /**
     * A test for GetBroadBandPrice api.
     * Tested api in two cases like success and failure.
     * @return void
     */
    public function testGetBroadBandPriceSuccessCase()
    {
        $testData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'b',
        ];
        
        $this->json('GET', 'api/getBroadBandPrice', $testData)
            ->assertStatus(200)
            ->assertJson(['price' => 1]);
    }

    public function testGetBroadBandPriceFailureCase()
    {
        $testData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'c',
        ];
        
        $this->json('GET', 'api/getBroadBandPrice', $testData)
            ->assertStatus(200)
            ->assertJson(['error' => 'no such a product named c']);
    }
}
