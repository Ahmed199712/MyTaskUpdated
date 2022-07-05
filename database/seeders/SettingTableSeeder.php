<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    
    public function run()
    {
        // Clear Settings Table ..
        DB::table('settings')->delete();

        // Create new setting columns 
        $setting = new Setting;
        $setting->app_name = 'Task';
        $setting->app_email = 'task@gmail.com';
        $setting->app_phone = '0101010101010';
        $setting->app_address = 'Example Address';
        $setting->vat = 14;
        $setting->save();
    }
}
