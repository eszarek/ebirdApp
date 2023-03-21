<?php

/* 
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  3/19/2023
  * Time:  5:51 PM
*/  

//cURL setup'
$header = [
    'x-ebirdapitoken: p3d5l7u0e7oe'
];

$ch = curl_init("https://api.ebird.org/v2/data/obs/US-SC-043/recent");
//send headers
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

//return response body returned as string instead of straight to browser
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//save response to variable
$response = curl_exec($ch);


curl_close($ch);
//read json, TRUE makes assoc. arrays
$data =json_decode($response, true);

foreach ($data as $repo){

    echo $repo ["comName"],
        $repo ["howMany"],
        $repo ["lat"],
        $repo["long"], "<br>";
}