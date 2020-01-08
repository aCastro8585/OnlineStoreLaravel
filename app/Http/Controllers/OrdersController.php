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
        //
        $order=new Order;
        $order->customer_name =  $request->customer_name;
        $order->customer_id_type = $request->customer_id_type; 
        $order->customer_id = $request->customer_id; 
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile; 
        return view('orders.show')->with('order', $order);
    }


    public function store(Request $request)
    {
        $order=new Order;
        $order->customer_name =  $request->customer_name;
        $order->customer_id_type = $request->customer_id_type; 
        $order->customer_id = $request->customer_id; 
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile; 
        $order->status = 'CREATED'; 
        $order->p2p_url = 'www.google.com'; 
        $order->request_id = '233223';
        $order->save(); 
       // $order->save();
         /*    $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://dev.placetopay.com/redirection/',
            // You can set any number of default request options.
          
        ]);
           
      $requestBody=PlaceToPayRequest::getRequestBodyContent($order);
      //  $response = $client->post('https://dev.placetopay.com/redirection/api/session', array(), $requestBody);
   
        $client = new Client(["base_uri" => "https://dev.placetopay.com/redirection/"]);

        $response = $client->request('POST', 'https://dev.placetopay.com/redirection/api/session', [
            'auth'=>null,
            'json' => $requestBody
           
        ]);
   
        $json = json_decode($response->getBody(), true);
        $url= $json['processUrl']; 
       flash($url)->success();
       return redirect()->away($url); */

       flash('Guardado con éxito')->success();
       return view('orders.show')->with('order', $order);

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
