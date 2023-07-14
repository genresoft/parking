<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder


{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
        
            'name' => 'MD.Admin',
            'email_verified_at' => new DATETIME(),
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'created_at' => new DATETIME(),
            'updated_at' => new DATETIME(),


        ]);
        
    }
}
