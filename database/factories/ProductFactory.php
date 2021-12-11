<?php

namespace Database\Factories;

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
        $category = $subcategory->category;
        
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
            'price' => $this->faker->randomElement([9.990, 15.990, 19.990, 25.990, 29.990]),
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brands->id,
            'quantity' => $quantity,
            'status' => 2,
        ];
    }
}
