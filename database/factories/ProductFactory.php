<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        $subcategory = Subcategory::all()->random();
        $category = Category::all()->random();
        
        $brands = $category->brands->random();

        if($subcategory->color){
            $quantity = null;
        }else{
            $quantity = 15;
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([9990, 15990, 19990, 25990, 29990]),
            'category_id' => $category->id,
            'quantity' => $quantity,
            'status' => 2,
        ];
    }
}
