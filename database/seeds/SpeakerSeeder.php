<?php

use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Toshiba TX PR20',
            'categories_id' => 7,
            'price' => 155000
        ]);
        DB::table('products')->insert([
            'name' => 'MITO My Box S115',
            'categories_id' => 7,
            'price' => 195000
        ]);
        DB::table('products')->insert([
            'name' => 'Polytron PMA 9300',
            'categories_id' => 7,
            'price' => 575000
        ]);
        DB::table('products')->insert([
            'name' => 'Polytron PAS 22',
            'categories_id' => 7,
            'price' => 645000
        ]);
        DB::table('products')->insert([
            'name' => 'Polytron PMA 9505',
            'categories_id' => 7,
            'price' => 825000
        ]);
        
    }
}
