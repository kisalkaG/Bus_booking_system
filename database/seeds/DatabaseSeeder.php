<?php

use Illuminate\Database\Seeder;
use Modules\Auth\Database\Seeders\SuperAdminSeederTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederTableSeeder::class);

    }
}
