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
                'name' => 'Amor',
                'slug' => Str::slug('Amor'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Aniversario',
                'slug' => Str::slug('Aniversario'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Niños',
                'slug' => Str::slug('Nacimientos'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Niñas',
                'slug' => Str::slug('Nacimientos'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Cumpleaños',
                'slug' => Str::slug('Cumpleaños'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Peluches',
                'slug' => Str::slug('Peluches'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Chocolates',
                'slug' => Str::slug('Choocolates'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Globos',
                'slug' => Str::slug('Globos'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 5,
                'name' => 'Coronas',
                'slug' => Str::slug('Coronas'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 5,
                'name' => 'Cojines',
                'slug' => Str::slug('Cojines'),
                'color' => true,
                'size' => true,
            ],
        ];

        foreach ($subcategories as $subcategory){
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
