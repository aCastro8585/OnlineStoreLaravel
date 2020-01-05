<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests\OrderConfirmRequest;
use Illuminate\Support\Facades\Auth;
class OrdersController extends Controller
{
    /**
     * Display the form to order the item.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $user = Auth::user();
        return view('orders.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Confirm the order in a different view.
     * Validate the form with OrderConfirmRequest Class
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(OrderConfirmRequest $request)
    {
        //
        $order=new Order;
        $order->customer_name =  $request->customer_name;
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile; 
        return view('orders.show')->with('order', $order);
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
