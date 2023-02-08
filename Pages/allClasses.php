<?php

/*
  * Class: csci330fa22
  * User:  eeszarek
  * Date:  1/18/2023
  * Time:  9:39 AM
*/
require_once "header.php";
require_once "connect.php";

$sql = 'SELECT DISTINCT `Common_Name` FROM `ebirdList`';

//prepares a statement for execution

$stmt = $pdo->prepare($sql);

//execute the query
$stmt->execute();

//fetched the next row and returns array
//default: array indexed by column name and o-indexed column header
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($result)){
  echo "<p class='error'>Nothing found, please try again. <a href='../index.php'>Return to Home</a></p>";
}else {
 echo '<div id=\"allClasses\">
  <table>';

  foreach ($result as $row){
    ?>
    <?php if (!empty($row['CDescription'])) { ?>

          <table>
              <tr><th id="commonName"></th><th>Common Name<a href="<?php $currentFile; ?>?q=fndsc">&#9661;</a>
                      <a href="<?php $currentFile; ?>?q=fnasc">&#9650;</a></th>
          </table>



    <?php
  }//else no desc

  }//close for each
  echo "</table> </div>";
} //close empty else
require_once "footer.php";
?>
