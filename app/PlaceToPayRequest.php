<?php
	
namespace App;
use App\Order;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;
class PlaceToPayRequest {
    
    public static function createPaymentRequest ($userData){
        $requestBody=self::getRequestBodyContent($userData);
        try{
        $client = new Client(["base_uri" => "https://dev.placetopay.com/redirection/"]);
        $response = $client->request('POST', 'https://dev.placetopay.com/redirection/api/session', [
            'auth'=>null,
            'json' => $requestBody
        ]);
        $jsonResponse = json_decode($response->getBody(), true);
       
        }catch (\GuzzleHttp\Exception\ClientException $e) {
            $jsonResponse = $e->getResponse()->getBody()->getContents();
        }catch (\GuzzleHttp\Exception\RequestException $e) {
            $jsonResponse = $e->getMessage();
           }
        return $jsonResponse;
    }

    public static function consultPaymentStatus ($requestId){
        $data = array();
        $data['auth']=self::getAuthData();
        try{
            $client = new Client(["base_uri" => "https://dev.placetopay.com/redirection/"]);
            $response = $client->request('POST', 'https://dev.placetopay.com/redirection/api/session/'.$requestId, [
                'auth'=>null,
                'json' => $data
            ]);
            $jsonResponse = json_decode($response->getBody(), true);
       }catch (\GuzzleHttp\Exception\ClientException $e) {
            $jsonResponse = $e->getResponse()->getBody()->getContents();
         }catch (\GuzzleHttp\Exception\RequestException $e) {
            $jsonResponse = $e->getMessage();
           }
        return $jsonResponse;
    }
    
    public static function getRequestBodyContent($userData) {
        date_default_timezone_set("America/Bogota");
        $data = array();
        $data['auth']=self::getAuthData();
        $data['locale']="en_CO";
        $data['buyer']=self::getBuyerData($userData);
        $data['payment']=self::getPaymentData($userData);
        $date=date_create('c');
        date_add($date,date_interval_create_from_date_string("2 days"));
        $data['expiration'] = date_format($date,"c");;
        $data['returnUrl'] = URL::to('/').'/order/consult';
        $data['ipAddress'] ='127.0.0.1';
        $data['userAgent'] = 'PlacetoPay Sandbox';
        return $data;
    }
 


    public static function getAuthData() {
        $login='6dd490faf9cb87a9862245da41170ff2';
        $secretKey='024h1IlD';
        $seed = date('c');
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceBase64 = base64_encode($nonce);
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));

        $auth = array();
        $auth['login'] = $login;
        $auth['tranKey'] = $tranKey;
        $auth['nonce'] = $nonceBase64;
        $auth['seed'] = $seed;
        return $auth;
    }

    public static function getBuyerData($userData) {
        $buyer = array();
        $buyer['name'] = $userData->customer_name;
        $buyer['surname'] = '';
        $buyer['email'] =$userData->customer_email;
        $buyer['document'] = $userData->customer_id;
        $buyer['documentType'] =$userData->customer_id_type;
        $buyer['mobile'] = $userData->customer_mobile;
        return $buyer;
    }

    public static function getPaymentData($userData) {
        $reference=(Order::all()->isEmpty()) ? 0:Order::all()->last()->id ; 
        $payment = array();
        $payment['reference'] = strval($reference+1);
        $payment['description'] = 'Laptop ACER Aspire 5 Intel i5';
        $amount = array();
        $amount['currency'] ='COP';
        $amount['total'] = '1000';
        $payment['amount'] = $amount;
        $payment['allowPartial'] =false;
        return $payment;
    }
   
}

