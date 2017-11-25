<?php
namespace common\models;

class ConnectionClass {
    
    static private $accessToken;
    
    static public function establish() {
        $data = [
            'client_id' => 'junction',
            'client_secret' => 'vfH7JQRZ82s5',
            'response_type' => 'code',
            'scopes' => []
        ];
        
        $postData = self::post('https://rc-auth.elisaviihde.fi','/auth/authorize/access-code'
                ,'application/json', $data);
        
        $data = [
            "grant_type"=> "authorization_code",
            "username"=> "junction3",
            "password"=> "ihyty7bu",
            "client_id"=> "junction",
            "code"=> $postData->code
        ];
        
        $postData = self::post('https://rc-auth.elisaviihde.fi','/auth/authorize/access-token',
                'application/x-www-form-urlencoded', $data);
        
        self::$accessToken = $postData->access_token;
    }
    
    static public function get($url,$action,$appVersion = '2.0',$v = 2, $platform='online') {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url$action?v=$v&platform=$platform&appVersion=$appVersion");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [                                                                          
            'Authorization: Bearer '.self::$accessToken
        ]);           

        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close ($ch);
        
        return json_decode($server_output);
    }
    
    static public function post($url,$action,$encoding,$data){
        $ch = curl_init();
        if($encoding == 'application/json'){
            $data_string = (json_encode($data));
        } else {
            $data_string = (http_build_query($data));
        }
        curl_setopt($ch, CURLOPT_URL, "$url$action");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: '.$encoding,
            'Accept:'
            )                                                                       
        );
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close ($ch);
        return json_decode($server_output);
    }
    
}
