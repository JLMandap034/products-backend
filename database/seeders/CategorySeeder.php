<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    protected $categories = [
        ['name' => 'Category 1'],
        ['name' => 'Category 2'],
        ['name' => 'Category 3'],
        ['name' => 'Category 4'],
        ['name' => 'Category 5'],
        ['name' => 'Category 6'],
        ['name' => 'Category 7'],
        ['name' => 'Category 8'],
        ['name' => 'Category 9'],
        ['name' => 'Category 10'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Commence seeding operation: Create Category');
        foreach($this->categories as $category) {
            $this->command->info("Creating: {$category['name']}");
            Category::create($category);
        }
        Category::factory()->count(10)->create();
    }
}
