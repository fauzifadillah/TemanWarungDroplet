<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CategorySeeder
		DB::table('categories')->insert([
					'name' => 'SMARTPHONE',
					'image' => '/katalog/smartphone.png'
		]); 
		DB::table('categories')->insert([
	        'name' => 'KULKAS',
					'image' => '/katalog/kulkas.png'
		]); 
    DB::table('categories')->insert([
	        'name' => 'MESIN CUCI',
					'image' => '/katalog/mesincuci.png'
		]); 
		DB::table('categories')->insert([
	        'name' => 'BLENDER',
					'image' => '/katalog/blender.png'
		]); 
		DB::table('categories')->insert([
	        'name' => 'KIPAS ANGIN',
					'image' => '/katalog/kipasangin.png'
		]); 
		DB::table('categories')->insert([
	        'name' => 'TV',
					'image' => '/katalog/tv.png'
		]); 
		DB::table('categories')->insert([
	        'name' => 'SPEAKER',
					'image' => '/katalog/speaker.png'
		]); 
		DB::table('categories')->insert([
	        'name' => 'DISPENSER',
					'image' => '/katalog/dispenser.png'
		]); 
		DB::table('categories')->insert([
		    	'name' => 'GAS',
					'image' => '/katalog/gas.png'
		]); 
		DB::table('categories')->insert([
		    	'name' => 'FURNITUR',
					'image' => '/katalog/furnitur.png'
		]); 
		DB::table('categories')->insert([
		    	'name' => 'RICE COOKER',
					'image' => '/katalog/rice_cooker.png'
		]); 
		DB::table('categories')->insert([
		    	'name' => 'PERABOT',
					'image' => '/katalog/perabot.png'
		]); 
		DB::table('categories')->insert([
		    	'name' => 'SETRIKA',
					'image' => '/katalog/setrika.png'
		]); 
		DB::table('categories')->insert([
		    	'name' => 'LAPTOP/TABLET',
					'image' => '/katalog/laptop.png'
		]); 
    }
}
