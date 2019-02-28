<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetEnergyPriceTest extends TestCase
{
    /**
     * A test for GetEnergyPrice api.
     * Tested api in two cases like success and failure.
     * @return void
     */
    public function testGetEnergyPriceSuccessCase()
    {
        $testData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'b',
            'product_variation' => 'c',
        ];
        
        $this->json('GET', 'api/getEnergyPrice', $testData)
            ->assertStatus(200)
            ->assertJson(['price' => 20]);
    }
    
    public function testGetEnergyPriceFailureCase()
    {
        $testData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'c',
            'product_variation' => 'c',
        ];
        
        $this->json('GET', 'api/getEnergyPrice', $testData)
            ->assertStatus(200)
            ->assertJson(['error' => 'no such a product named c or with variation named c']);
    }
}
