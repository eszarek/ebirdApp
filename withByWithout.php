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
            $sorting = "`seen` ASC";
            break;
        case "birdDESC":
            $sorting = "`seen` DESC";
            break;
        case "photoASC":
            $sorting = "`photo` ASC, `seen`";
            break;
        case "photoDESC":
            $sorting = "`photo` DESC, `seen`";
            break;
        default:
            $sorting = "`seen`  ASC";
    }
}
else {
    $sorting = "seen";
}

$sql = "SELECT `ebirdList`.`Common_Name` as `seen`, `eBirdPhotoCat`.`Common_Name` as `photo`,
       `eBirdPhotoCat`.`eBird_Species_Code` as `plink`

    FROM `ebirdList`

    LEFT JOIN

    `eBirdPhotoCat`

    ON `ebirdList`.`Common_Name` = `eBirdPhotoCat`.`Common_Name`

    GROUP BY `ebirdList`.`Common_Name`
    ORDER BY $sorting
    ";
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
    <a href="<?php $currentFile; ?>?q=birdDESC">&#9650;</a></td><td>Photo<a href="<?php $currentFile; ?>?q=photoASC">&#9661;</a>
                <a href="<?php $currentFile; ?>?q=photoDESC">&#9650;</a></td></tr>
<?php
  foreach ($result as $row){
    ?>
              <tr>
                  <td> <?php echo $row['seen']?>
                      </td>
                  <td><?php if ($row['photo'] == NULL) {echo "Photo Needed";}
                      else {echo "<a href= https://media.ebird.org/catalog?taxonCode=" . $row['plink'] .
                          "&userId=USER644562> Latest photo</a>";}?>
                  </td>

              </tr>

    <?php
  //else no desc

  }//close for each
  echo "</table> </div>";
 //close empty else
require_once "footer.php";
?>
