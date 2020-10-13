<?php

use Illuminate\Database\Seeder;

class KulkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Changhong CBC50',
            'categories_id' => 2,
            'price' => 1150000
        ]); 
        DB::table('products')->insert([
            'name' => 'Changhong CBC 100',
            'categories_id' => 2,
            'price' => 1325000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron PRB 158',
            'categories_id' => 2,
            'price' => 1600000
        ]); 
        DB::table('products')->insert([
            'name' => 'Sharp SJ-N162D',
            'categories_id' => 2,
            'price' => 1600000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron PRB 178',
            'categories_id' => 2,
            'price' => 1700000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron PRB 188',
            'categories_id' => 2,
            'price' => 1785000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron PRA17GO',
            'categories_id' => 2,
            'price' => 1845000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron PRA 18 BNR',
            'categories_id' => 2,
            'price' => 1925000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron PRA 18 HO',
            'categories_id' => 2,
            'price' => 1950000
        ]); 
        DB::table('products')->insert([
            'name' => 'Panasonic 19 ANHV',
            'categories_id' => 2,
            'price' => 1975000
        ]); 
        DB::table('products')->insert([
            'name' => 'LG GN-210CK',
            'categories_id' => 2,
            'price' => 2145000
        ]); 
        DB::table('products')->insert([
            'name' => 'AQUA AQR D 261',
            'categories_id' => 2,
            'price' => 2525000
        ]); 
        DB::table('products')->insert([
            'name' => 'TCL TCF-200CJ',
            'categories_id' => 2,
            'price' => 2530000
        ]); 
        DB::table('products')->insert([
            'name' => 'Sharp SJ-197 ND',
            'categories_id' => 2,
            'price' => 2550000
        ]); 
        DB::table('products')->insert([
            'name' => 'AQUA AQRD 270',
            'categories_id' => 2,
            'price' => 2699000
        ]); 
        DB::table('products')->insert([
            'name' => 'Sharp SJ 237MD',
            'categories_id' => 2,
            'price' => 2750000
        ]); 
        DB::table('products')->insert([
            'name' => 'LG  195 SQMT 2',
            'categories_id' => 2,
            'price' => 3150000
        ]); 
        DB::table('products')->insert([
            'name' => 'Sharp SJ-316MG',
            'categories_id' => 2,
            'price' => 3225000
        ]); 
        DB::table('products')->insert([
            'name' => 'LG GN-B2155QMT',
            'categories_id' => 2,
            'price' => 3450000
        ]); 
        DB::table('products')->insert([
            'name' => 'LG GN-B215 SQMT',
            'categories_id' => 2,
            'price' => 3450000
        ]); 
        DB::table('products')->insert([
            'name' => 'GEA AB 106 R ',
            'categories_id' => 2,
            'price' => 2150000
        ]); 
        DB::table('products')->insert([
            'name' => 'RSA XS-100',
            'categories_id' => 2,
            'price' => 2238500
        ]); 
        DB::table('products')->insert([
            'name' => 'RSA  CF 220',
            'categories_id' => 2,
            'price' => 2545000
        ]); 
        DB::table('products')->insert([
            'name' => 'GEA AB 226 R',
            'categories_id' => 2,
            'price' => 2900000
        ]); 
        DB::table('products')->insert([
            'name' => 'STEKO MG-220',
            'categories_id' => 2,
            'price' => 2730000
        ]); 
        DB::table('products')->insert([
            'name' => 'STEKO MG-300',
            'categories_id' => 2,
            'price' => 3175000
        ]); 
        DB::table('products')->insert([
            'name' => 'Polytron SCN 230',
            'categories_id' => 2,
            'price' => 3175000
        ]); 
    }
}
