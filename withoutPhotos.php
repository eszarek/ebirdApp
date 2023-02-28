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

        case "birdASC":
            $sorting = "`Species` ASC";
            break;
        case "birdDESC":
            $sorting = "`Species` DESC";
            break;
        default:
            $sorting = "`Species`  ASC";
    }
}
else {
    $sorting = "Species";
}

$sql = "SELECT
    `LifeList`.`Species` AS `Species`
FROM
    `LifeList`
WHERE
    !(
        `LifeList`.`Species` IN(
        SELECT
            `Photo list`.`CommonName`
        FROM
            `Photo list`
    )
    
    )
    ORDER BY $sorting";
//prepares a statement for execution

$stmt = $pdo->prepare($sql);

//execute the query
$stmt->execute();

//fetched the next row and returns array
//default: array indexed by column name and o-indexed column header
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<h3>Birds without photos</h3>
<div><table><tr><td>Common Name<a href="<?php $currentFile; ?>?q=birdASC">&#9661;</a>
    <a href="<?php $currentFile; ?>?q=birdDESC">&#9650;</a></td></tr>
<?php
  foreach ($result as $row){
    ?>
              <tr>
                  <td> <?php echo $row['Species']?>
                      </td>

              </tr>

    <?php
  //else no desc

  }//close for each
  echo "</table> </div>";
 //close empty else
require_once "footer.php";
?>
