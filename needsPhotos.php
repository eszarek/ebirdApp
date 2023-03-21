<?php
$pageName = "without";
require_once "header.php";
require_once "connect.php";


/* 
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  3/19/2023
  * Time:  6:33 PM*/



//get list of needed birds

$sql = "SELECT `ebirdList`.`Common_Name`
FROM `303f2eeszarek`.`ebirdList`
WHERE 
    `ebirdList`.`Common_Name` NOT LIKE '%sp.%'
    AND `ebirdList`.`Common_Name` NOT LIKE '%/%'
    AND `ebirdList`.`Common_Name` NOT LIKE '%(%'
    AND `ebirdList`.`Common_Name` NOT IN (
        SELECT `eBirdPhotoCat`.`Common_Name`
        FROM `303f2eeszarek`.`eBirdPhotoCat`
    )
GROUP BY `Common_Name`"
    ;
//prepares a statement for execution

$stmt = $pdo->prepare($sql);

//execute the query
$stmt->execute();

//fetched the next row and returns array
//default: array indexed by column name and o-indexed column header
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);



foreach ($result as $commonName) {
    //print_r($commonName["Common_Name"]);
    $cn = $commonName["Common_Name"];
    $species = findSpeciesCode($cn);
    echo  '<a  href="view.php?q=' . $species . '" target="_blank">' . $cn . '</a><br>';

    echo "<br>";}


