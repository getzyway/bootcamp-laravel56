<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=100; $i++) {
			DB::table('shops')->insert([
		        'user_id'   => $i,
		        'name'      => 'ShopID:'.$i.'-UserID:'.$i,
		        'desc'      => 'desc',
		    ]);
		}

    }
}
