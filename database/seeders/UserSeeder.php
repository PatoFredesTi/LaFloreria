<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name'=>'admin']);

        User::create([
            'name' => 'Admin',
            'email' => 'duck2693@gmail.com',
            'password' => bcrypt('admin'),
        ])->assignRole('admin');
    }
}
