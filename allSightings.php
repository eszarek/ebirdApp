<?php

/*
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  1/18/2023
  * Time:  9:39 AM
*/
$pageName = "allSightings";
require_once "header.php";
//sorting

if(isset($_GET['q'])) {
    switch ($_GET['q']) {

        case "birdASC":
            $sorting = "`Common_Name` ASC";
            break;
        case "birdDESC":
            $sorting = "`Common_Name` DESC";
            break;
        default:
            $sorting = "`Common_Name`  ASC";
    }
}
else {
    $sorting = "Common_Name";
}
//Send it
$sql = "SELECT DISTINCT `Common_Name` FROM `ebirdList`
        ORDER BY $sorting";

//prepares a statement for execution

$stmt = $pdo->prepare($sql);

//execute the query
$stmt->execute();

//fetched the next row and returns array
//default: array indexed by column name and o-indexed column header
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h3>All reported species</h3>
<div id=\"allClasses\">
  <table><th id="Common_Name" >Species<a href="<?php $currentFile;?>?q=birdASC">&#9661;</a>
          <a href="<?php $currentFile;?>?q=birdDESC">&#9650;</a></th>
<?php
  foreach ($result as $row){
    ?>
              <tr>
                  <td> <?php echo $row['Common_Name']?>
                      </td>
              </tr>

    <?php
  //else no desc

  }//close for each
  echo "</table> </div>";
 //close empty else
require_once "footer.php";
?>
