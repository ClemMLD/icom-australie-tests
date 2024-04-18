<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_create_product(): void
    {
        $product = [
            'name' => 'Product 1',
            'price' => 100,
            'description' => 'Description of product 1',
        ];
        $response = $this->post('/products', $product);
        $response->assertStatus(201);
    }

    public function test_get_all_products(): void
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_get_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->get("/products/{$product->id}");
        $response->assertStatus(200);
    }

    public function test_update_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->put("/products/{$product->id}", [
            'name' => 'Product 2',
            'price' => 200,
            'description' => 'Description of product 2',
        ]);
        $response->assertStatus(200);
    }

    public function test_delete_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->delete("/products/{$product->id}");
        $response->assertStatus(204);
    }
}
