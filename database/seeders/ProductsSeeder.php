<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $size = Size::inRandomOrder()->first();
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert(
                array(
                    'id' => $faker->unique()->randomNumber,
                    'name' => 'Camisa manga Larga',
                    'size_id' => $size->id,
                    'remarks' => 'Camisa negra de algodón',
                    'brand' => 'Adidas',
                    'quantity' => 10,
                    'date_shipment' =>  date('Y-m-d H:m:s'),
                )
            );
        }
    }
}
