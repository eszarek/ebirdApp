<?php

$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );

if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

    $lat = $geoplugin['geoplugin_latitude'];
    $long = $geoplugin['geoplugin_longitude'];
    //set farenheight for US
    if ($geoplugin['geoplugin_countryCode'] == 'US') {
        $tempScale = 'fahrenheit';
        $tempUnit = '&deg;F';
    } else {
        $tempScale = 'celsius';
        $tempUnit = '&deg;C';
    }



    $html = "<h2>lat: " . $geoplugin['geoplugin_latitude'] . "long" .$geoplugin['geoplugin_longitude'] . "</h2>";


}

