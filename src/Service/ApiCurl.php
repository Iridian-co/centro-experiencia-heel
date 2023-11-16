<?php

namespace App\Service;

class ApiCurl
{

    function CallAPI($method, $url, $data = false, $token=null)
    {

        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        if ($token) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Cache-Control: no-cache",
                "Content-length: ".strlen($data),
                "Authorization: Bearer " . $token
            ));
        } else {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Cache-Control: no-cache",
                "Content-length: ".strlen($data)
            ));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);


        $result = curl_exec($curl);
        $info=curl_getinfo($curl);

        curl_close($curl);

        if(!$result){
            $result=json_encode($info);
        }

        return json_decode($result);
    }

}
