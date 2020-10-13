<?php

use Illuminate\Database\Seeder;

class BlenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Blender Portable 4 Mata Pisau',
            'categories_id' => 4,
            'price' => 64000
        ]);
        DB::table('products')->insert([
            'name' => 'Miyako BL-102 PL',
            'categories_id' => 4,
            'price' => 240000
        ]);
        DB::table('products')->insert([
            'name' => 'Miyako BL-101 PL',
            'categories_id' => 4,
            'price' => 205000
        ]);
        DB::table('products')->insert([
            'name' => 'Miyako  BL-151 PF',
            'categories_id' => 4,
            'price' => 222500
        ]);
        DB::table('products')->insert([
            'name' => 'Miyako BL-152 PF',
            'categories_id' => 4,
            'price' => 250000
        ]);
        DB::table('products')->insert([
            'name' => 'Cosmos On The Go CB-522',
            'categories_id' => 4,
            'price' => 270000
        ]);
        DB::table('products')->insert([
            'name' => 'Cosmos CB-281 Gv',
            'categories_id' => 4,
            'price' => 275555
        ]);
        DB::table('products')->insert([
            'name' => 'Miyako BL-152 GF',
            'categories_id' => 4,
            'price' => 298500
        ]);
        DB::table('products')->insert([
            'name' => 'Cosmos CB-8282 G',
            'categories_id' => 4,
            'price' => 305000
        ]);
        DB::table('products')->insert([
            'name' => 'Cosmos CB-802',
            'categories_id' => 4,
            'price' => 435000
        ]);
        DB::table('products')->insert([
            'name' => 'Philips HR-2116',
            'categories_id' => 4,
            'price' => 670000
        ]);


    }
}
