<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory  as Faker;
use App\Order;
class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testOrderModelCanCreateOrder()
    {
        $faker = Faker::create();
        $data = [
            'user_id' => $faker->randomDigit,
            'customer_name' => $faker->Name,
            'customer_id_type' => 'CC',
            'customer_id' => $faker->randomDigit,
            'customer_email' => $faker->email,
            'customer_mobile' =>$faker->phoneNumber,
            'status' => 'CREATED',
            'p2p_url' => $faker->url,
            'request_id' => $faker->randomDigit,
           
        ];
      
        $order=new Order;

        $order->user_id=$data['user_id'];
        $order->customer_name=$data['customer_name'];
        $order->customer_id_type=$data['customer_id_type'];
        $order->customer_id=$data['customer_id'];
        $order->customer_email=$data['customer_email'];
        $order->customer_mobile=$data['customer_mobile'];
        $order->status=$data['status'];
        $order->p2p_url = $data['p2p_url']; 
        $order->request_id = $data['request_id'];

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals($data['user_id'], $order->user_id);
        $this->assertEquals($data['customer_name'], $order->customer_name);
        $this->assertEquals($data['customer_id_type'], $order->customer_id_type);
        $this->assertEquals($order->customer_id,$data['customer_id']);
        $this->assertEquals($order->customer_email,$data['customer_email']);
        $this->assertEquals($order->customer_mobile,$data['customer_mobile']);
        $this->assertEquals($order->status,$data['status']);
        $this->assertEquals($order->p2p_url , $data['p2p_url']); 
        $this->assertEquals($order->request_id , $data['request_id']);

    }
}
