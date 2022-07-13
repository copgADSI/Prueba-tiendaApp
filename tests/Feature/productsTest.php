<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class productsTest extends TestCase
{

    public function test_a_products_list()
    {
        $response = $this->get(route('products.index'));
        $response->assertSuccessful();
        $this->assertTrue(true);
    }

    public function test_a_single_product()
    {
        $product = Product::inRandomOrder()->first();
        $product_id = [
            'product_id' => $product->id
        ];

        $response = $this->getJson(route('products.details', $product_id));
        $this->assertDatabaseHas('products',  $product->toArray());
    }

    public function test_a_product_update_form()
    {
        $product = Product::inRandomOrder()->first();
        $product_id = [
            'product_id' => $product->id
        ];
        $response = $this->post(route('products.update', $product_id));
        $response->assertStatus(200);
        $this->assertDatabaseHas('products',  $product->toArray());
    }

    public function test_a_product_update()
    {
        $product = Product::inRandomOrder()->first();
        $size = Size::inRandomOrder()->first()->id;
        $product_data = [
            'id' => $product->id,
            'name' => 'camiseta naranja larga',
            'quantity' => 42,
            'size_id' => $size,
            'brand' => 'Puma',
            'remarks'  =>  'Camiseta fabricada  en algodón'
        ];

        $response = $this->post(route('products.update_data', $product_data));
        $response->assertStatus(200);
        $this->assertEquals(count($product_data), count($product_data));
        $this->assertDatabaseHas('products',  $product_data);
    }
}
