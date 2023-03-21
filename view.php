<?php

/* 
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  3/20/2023
  * Time:  7:39 PM
*/
$pageName = "view";
require_once "header.php";

$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );

if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

    $lat = $geoplugin['geoplugin_latitude'];
    $long = $geoplugin['geoplugin_longitude'];}

    $species = $_GET['q'];


    //call ebird api for local recent findings
    $header = [
        'x-ebirdapitoken: p3d5l7u0e7oe'
    ];

    $ch = curl_init("https://api.ebird.org/v2/data/obs/geo/recent/$species?lat=$lat&lng=$long");
//send headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

//return response body returned as string instead of straight to browser
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//save response to variable
    $response = curl_exec($ch);


    curl_close($ch);
//read json, TRUE makes assoc. arrays
    $data = json_decode($response, true);

    if (empty($data)){
        echo "No sightings";
    }
    else{
        foreach ($data as $bird){
            $qbird= $bird ["comName"];
            break;
        }
        echo "<h2> Recent sightings for " . $qbird . "</h2>";
    foreach ($data as $repo) {

        echo $repo ["locName"] . "<br>",
        $repo ["obsDt"] . "<br>",
        "Lat: " . $repo["lat"] . " Long: " . $repo["lng"] . "<br><br>";
    }
    }

