<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

use illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Amor y Aniversario',
                'slug' => Str::slug('Amor y Aniversario'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Amor',
                'slug' => Str::slug('Amor'),
            ],
            [
                'category_id' => 1,
                'name' => 'Aniversario',
                'slug' => Str::slug('Aniversario'),
            ],
            [
                'category_id' => 4,
                'name' => 'Peluches',
                'slug' => Str::slug('Peluches'),
            ],
            [
                'category_id' => 4,
                'name' => 'Chocolates',
                'slug' => Str::slug('Choocolates'),
            ],
            [
                'category_id' => 4,
                'name' => 'Globos',
                'slug' => Str::slug('Globos'),
            ],
            [
                'category_id' => 5,
                'name' => 'Coronas',
                'slug' => Str::slug('Coronas'),
            ],
            [
                'category_id' => 5,
                'name' => 'Cojines',
                'slug' => Str::slug('Cojines'),
            ],
        ];

        foreach ($subcategories as $subcategory){
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
