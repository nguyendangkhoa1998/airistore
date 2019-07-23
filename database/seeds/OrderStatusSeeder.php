<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $order_status = [
       		['status' => 1,'title'=>'Pending'],
       		['status' => 2,'title'=>'Processing'],
       		['status' => 3,'title'=>'Completed'],
       		['status' => 4,'title'=>'Cancelled'],
       ];
       DB::table('order_status')->insert($order_status);
    }
}
