<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['bangkok', 'nakornpathom', 'samutprakarn'];
        foreach($cities as $city) {
            DB::table('cities')->insert([
                'name'      => $city
            ]);
        }
    }
}
