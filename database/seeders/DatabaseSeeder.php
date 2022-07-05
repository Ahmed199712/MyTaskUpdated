<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SettingTableSeeder;
use Database\Seeders\ProductTableSeeder;
class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(SettingTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
