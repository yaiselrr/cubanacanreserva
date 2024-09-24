<?php

use Illuminate\Database\Seeder;
use   App\Modelos\AutosFlexiFlyDrive;
use   App\Modelos\AutosFlexiFlyDriveTraslation;

class AutosFlexiFlyDrivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autos_flexi_fly_drives')->delete();
        DB::table('tarifario_f_f_d_s')->delete();
        $path = base_path() . '\database\dbscripts\cubanacan.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
