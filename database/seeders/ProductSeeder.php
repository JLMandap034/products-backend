<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    protected $products = [
        ['name' => 'Product 1', 'category_id' => "1", 'description' => 'Product 1', 'image_data' => NULL],
        ['name' => 'Product 2', 'category_id' => "1", 'description' => 'Product 2', 'image_data' => NULL],
        ['name' => 'Product 3', 'category_id' => "1", 'description' => 'Product 3', 'image_data' => NULL],
        ['name' => 'Product 4', 'category_id' => "1", 'description' => 'Product 4', 'image_data' => NULL],
        ['name' => 'Product 5', 'category_id' => "1", 'description' => 'Product 5', 'image_data' => NULL],
        ['name' => 'Product 6', 'category_id' => "1", 'description' => 'Product 6', 'image_data' => NULL],
        ['name' => 'Product 7', 'category_id' => "1", 'description' => 'Product 7', 'image_data' => NULL],
        ['name' => 'Product 8', 'category_id' => "1", 'description' => 'Product 8', 'image_data' => NULL],
        ['name' => 'Product 9', 'category_id' => "1", 'description' => 'Product 9', 'image_data' => NULL],
        ['name' => 'Product 10', 'category_id' => "1", 'description' => 'Product 10', 'image_data' => NULL],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Commence seeding operation: Create Products');
        foreach($this->products as $product) {
            $product['category_id'] = Category::find(rand(1,20))->id;
            $this->command->info("Creating: {$product['name']}");
            Product::create($product);
        }
        Product::factory()->count(10)->create();
    }
}
