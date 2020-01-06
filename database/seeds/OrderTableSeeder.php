<?php

use Illuminate\Database\Seeder;
use App\Order;
class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->truncate();
        $faker = \Faker\Factory::create();
     
         foreach(range(1,50) as $index)
         {
        
         Order::create([
         'customer_name' => $faker->name,
         'customer_email' => $faker->email,
         'customer_mobile' => $faker->phoneNumber,
         'status' => 'CREATED',
         ]);
     }

    }
}
