<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder


{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $admin = User::create([
            'name' => 'MD.Admin',
            'email_verified_at' => new DATETIME(),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'remember_token' => str_random(10),
            'created_at' => new DATETIME(),
            'updated_at' => new DATETIME()
        ]);
        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'MD.User',
            'email_verified_at' => new DATETIME(),
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'remember_token' => str_random(10),
            'created_at' => new DATETIME(),
            'updated_at' => new DATETIME()
        ]);
        $user->assignRole($userRole);
    }
}
