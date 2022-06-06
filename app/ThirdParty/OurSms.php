<?php

namespace App\ThirdParty;

use Illuminate\Support\Facades\Http;

class OurSms
{
    protected $url = 'http://www.oursms.net/api/sendsms.php';

    protected $data = [
        'username' => 'skiline',
        'password' => 'skiline',
        'sender' => 'SkyLine-AD',
        'return' => 'json',
        'unicode' => 'E'
    ];

    const SUCCESS = 100;


    function send($mobileNumber,$messageContent)
    {
        $user = $this->data['username'];
        $password = $this->data['password'];
        $sendername = $this->data['sender'];
        $text = urlencode( $messageContent);
        $to = $mobileNumber;

        $url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=json";

        $ret = file_get_contents($url);
        $result = json_decode(json_decode(json_encode(nl2br($ret))));
        if ($result->Code != static::SUCCESS) {
            //info($result);
        }
        return $result;
    }
}