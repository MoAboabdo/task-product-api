<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    

    public function testProductCreation()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 19.99,
            'qty' => 100,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 19.99,
            'qty' => 100,
        ]);
    }

    public function  testProductRetrieval()
    {
        $product = Product::create([
            'name' => 'Sample Product',
            'description' => 'This is a sample product.',
            'price' => 15.99,
            'qty' => 30,
        ]);

        $retrievedProduct = Product::find($product->id);

        $this->assertNotNull($retrievedProduct);
        $this->assertEquals('Sample Product', $retrievedProduct->name);
        $this->assertEquals('This is a sample product.', $retrievedProduct->description);
        $this->assertEquals(15.99, $retrievedProduct->price);
        $this->assertEquals(30, $retrievedProduct->qty);
    }
    public function testProductUpdate()
    {
        $product = Product::create([
            'name' => 'created Product',
            'description' => 'This is an created product.',
            'price' => 9.99,
            'qty' => 50,
        ]);

        $product->update([
            'name' => 'Updated Product',
            'description' => 'This is an updated product.',
            'price' => 29.99,
            'qty' => 75,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Updated Product',
            'description' => 'This is an updated product.',
            'price' => 29.99,
            'qty' => 75,
        ]);
    }
    public function testProductDeletion()
    {
        $product = Product::create([
            'name' => 'Product to Delete',
            'description' => 'This product will be deleted.',
            'price' => 15.99,
            'qty' => 20,
        ]);

        $product->delete();

        $this->assertDatabaseMissing('products', [
            'name' => 'Product to Delete',
            'description' => 'This product will be deleted.',
            'price' => 15.99,
            'qty' => 20,
        ]);
    }
   
}
