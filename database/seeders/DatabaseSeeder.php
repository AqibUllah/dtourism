<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> bcrypt('password'),
        ]);

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        $user->assignRole('admin');

        Role::create(['name' => 'customer','guard_name' => 'customer']);
        Role::create(['name' => 'hotel_manager','guard_name' => 'hotelmanager']);
        Role::create(['name' => 'transport_manager','guard_name' => 'transporter']);
    }
}
