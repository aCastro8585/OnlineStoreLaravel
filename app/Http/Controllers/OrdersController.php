<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\PlaceToPayRequest;
use App\Http\Requests\OrderConfirmRequest;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
class OrdersController extends Controller
{
    /**
     * Display the form to order the item.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


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
        return view('orders.show')->with('request', $request);
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $order=new Order;
        $order->customer_name=$request->customer_name;
        $order->customer_id_type=$request->customer_id_type;
        $order->customer_id=$request->customer_id;
        $order->customer_email=$request->customer_email;
        $order->customer_mobile=$request->customer_mobile;
        $order->status='CREATED';

        $response=PlaceToPayRequest::createPaymentRequest($order);
        $url= $response['processUrl']; 
        $requestId= $response['requestId']; 
      
        $order->p2p_url = $url; 
        $order->request_id = $requestId;
        $user->order()->save($order); 

        return redirect()->away($order->p2p_url); 
     
    }

    public function showTransactionState(){

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
