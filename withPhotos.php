<?php

/*
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  1/18/2023
  * Time:  9:39 AM
*/
$pageName = "allSightings";
require_once "header.php";
require_once "connect.php";
//echo $_GET['q'];
//sorting
if(isset($_GET['q'])) {
    switch ($_GET['q']) {
        case "dateASC":
            $sorting = "`p`.`Date`  ASC";
            break;
        case "dateDESC":
            $sorting = "`p`.`Date`  DESC";
            break;
        case "birdASC":
            $sorting = "`p`.`Common_Name` ASC";
            break;
        case "birdDESC":
            $sorting = "`p`.`Common_Name` DESC";
            break;
        default:
            $sorting = "`p`.`Date`  ASC";
    }
}
else {
    $sorting = "`p`.`Date`";
}

$sql = "SELECT p.Common_Name, p.Date
        FROM eBirdPhotoCat as p
        INNER JOIN ebirdList as a
        ON p.Common_Name = a.Common_Name
        GROUP BY Common_Name  
        ORDER BY $sorting";
//prepares a statement for execution

$stmt = $pdo->prepare($sql);

//execute the query
$stmt->execute();

//fetched the next row and returns array
//default: array indexed by column name and o-indexed column header
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<h3>Birds seen that have photos</h3>
<div><table><tr><td>Common Name<a href="<?php $currentFile; ?>?q=birdASC">&#9661;</a>
    <a href="<?php $currentFile; ?>?q=birdDESC">&#9650;</a></td><td>Recent Photo<a href="<?php $currentFile; ?>?q=dateASC">&#9661;</a>
    <a href="<?php $currentFile; ?>?q=dateDESC">&#9650;</a></td></tr>
<?php
  foreach ($result as $row){
    ?>
              <tr>
                  <td> <?php echo $row['Common_Name']?>
                      </td>
                  <td><?php echo $row['Date']?></td>
              </tr>

    <?php
  //else no desc

  }//close for each
  echo "</table> </div>";
 //close empty else
require_once "footer.php";
?>
