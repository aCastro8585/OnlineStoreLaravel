<?php
	
namespace App;
 
class PlaceToPayRequest {
    
    public static function getRequestBodyContent($userData) {
        $data = array();
        $data['auth']=self::getAuthData();
        $data['locale']="en_CO";
        $data['buyer']=self::getBuyerData($userData);
        $data['payment']=self::getPaymentData($userData);
        $data['expiration'] = '2020-02-09T00:00:00-05:00';
        $data['returnUrl'] = 'http://localhost/projects/OnlineStore/public/home';
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
        $buyer['surname'] = $userData->customer_name;
        $buyer['email'] =$userData->customer_email;
        $buyer['document'] = '1341453335135';
        $buyer['documentType'] ='CC';
        $buyer['mobile'] = $userData->customer_mobile;
        return $buyer;
    }

    public static function getPaymentData($userData) {
        $payment = array();
        $payment['reference'] = '1233345';
        $payment['description'] = 'Laptop ACER Aspire 5 Intel i5';
        $amount = array();
        $amount['currency'] ='COP';
        $amount['total'] = '1000';
        $payment['amount'] = $amount;
        $payment['allowPartial'] =false;
        return $payment;
    }

    public static function getReturnData($userData) {
        $returnData = array();
        $returnData['expiration'] = '2019-03-06T00:00:00-05:00';
        $returnData['returnUrl'] = 'http://localhost/projects/OnlineStore/public/order';
        $returnData['ipAddress'] ='127.0.0.1';
        $returnData['userAgent'] = 'PlacetoPay Sandbox';
        return $returnData;
    }
 
}

/* {
    "auth": {
      "login": "usuarioprueba",
      "tranKey": "jsHJzM3+XG754wXh+aBvi70D9/4=",
      "nonce": "TTJSa05UVmtNR000TlRrM1pqQTRNV1EREprWkRVMU9EZz0=",
      "seed": "2019-04-25T18:17:23-04:00"
    },
      "locale": "en_CO",
      "buyer": {
        "name": "Deion",
        "surname": "Ondricka",
        "email": "dnetix@yopmail.com",
        "document": "1040035000",
        "documentType": "CC",
        "mobile": 3006108300
    },
  
      "payment": {
          "reference": "3210",
          "description": "Pago básico de prueba 04032019",
          "amount": {
              "currency": "COP",
              "total": "10000"
          },
        "allowPartial":false
        },
  
      "expiration": "2019-03-05T00:00:00-05:00",
      "returnUrl": "https://mysite.com/response/3210",
      "ipAddress": "127.0.0.1",
      "userAgent": "PlacetoPay Sandbox"
  } */