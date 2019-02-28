<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaveEnergyPriceTest extends TestCase
{
    /**
     * A test for SaveEnergyPrice api.
     * Tested api in two cases like success and failure.
     * @return void
     */
    public function testSaveEnergyPriceSuccessCase()
    {
        //Test save action
        $testSaveData = [
            'provider_name' => 'a',     //it depends on your db. In this case, current price is 20.
            'product_name' => 'b',
            'product_variation' => 'c',
            'new_price' => '10',
        ];
        
        $this->json('PATCH', 'api/saveEnergyPrice', $testSaveData)
            ->assertStatus(200)
            ->assertJson(['success' => 'Successfully updated']);
    
        //Check price value
        $testGetData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'b',
            'product_variation' => 'c',
        ];
        
        $this->json('GET', 'api/getEnergyPrice', $testGetData)
            ->assertStatus(200)
            ->assertJson(['price' => 10]);

        //Make price back to original 20.
        $testSaveData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'b',
            'product_variation' => 'c',
            'new_price' => '20',
        ];
        
        $this->json('PATCH', 'api/saveEnergyPrice', $testSaveData)
            ->assertStatus(200)
            ->assertJson(['success' => 'Successfully updated']);
    }
    
    public function testSaveEnergyPriceFailureCase()
    {
        $testData = [
            'provider_name' => 'a',     //it depends on your db.
            'product_name' => 'c',
            'product_variation' => 'c',
            'new_price' => '10',
        ];
        
        $this->json('PATCH', 'api/saveEnergyPrice', $testData)
            ->assertStatus(200)
            ->assertJson(['error' => 'no such a product named c or with variation named c']);
    }    
}
