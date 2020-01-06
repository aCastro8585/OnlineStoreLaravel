<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    public function index(){
    $orders = Order::paginate(8);
    return view('admin.index')->withOrders($orders);
    }
}
