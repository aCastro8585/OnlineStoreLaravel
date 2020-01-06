<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    public function index(){
    $orders = Order::orderBy('created_at', 'desc')->get();
    return view('admin.index')->withOrders($orders);
    }
}
