<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Amor y Aniversario',
                'slug' => Str::slug('amor-y-aniversario'),
                'icon' => '<i class="fas fa-heart"></i>',
            ],
            [
                'name' => 'Nacimientos',
                'slug' => Str::slug('nacimientos'),
                'icon' => '<i class="fas fa-baby-carriage"></i>',
            ],
            [
                'name' => 'Cumpleaños',
                'slug' => Str::slug('cumpleaños'),
                'icon' => '<i class="fas fa-gift"></i>',
            ],
            [
                'name' => 'Cholates, Peluches y Globos',
                'slug' => Str::slug('cholates-peluches-y-globos'),
                'icon' => '<i class="fas fa-gifts"></i>',
            ],
            [
                'name' => 'Defunciones',
                'slug' => Str::slug('defunciones'),
                'icon' => '<i class="fas fa-cross"></i>',
            ],
        ];

        foreach ($categories as $category) {
            Category::factory(1)->create($category);
        }
     
    }
}
