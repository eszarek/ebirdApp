<?php

/* 
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  3/19/2023
  * Time:  7:34 PM


//SCIENTIFIC_NAME,COMMON_NAME,SPECIES_CODE,CATEGORY,TAXON_ORDER,COM_NAME_CODES,SCI_NAME_CODES,BANDING_CODES,ORDER,
//FAMILY_COM_NAME,FAMILY_SCI_NAME,REPORT_AS,EXTINCT,EXTINCT_YEAR,FAMILY_CODE

function findSpeciesCode($commonName){
$taxonomy =file_get_contents("ebird forms.json");
//$taxonomy = fopen("ebird forms.json", "r") or die ("Unable to open file");
$jsonTax = json_decode($taxonomy, true);
echo '<pre>';
foreach ($jsonTax as $species) {
    if ($species["COMMON_NAME"] == $commonName){
    return $species["SPECIES_CODE"];
    }
    echo "not found";

}

}*/
