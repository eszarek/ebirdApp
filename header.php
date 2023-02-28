<?php

//start the session - used for login
session_start();

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');

//Include Files
require_once "connect.php";
require_once "logic/functions.php";

//Initial Variables
//When using,  watch for capitalization of variable names.  Make changes as necessary.
$currentFile = basename($_SERVER['SCRIPT_FILENAME']);
$rightNow = new DateTime();
$dateTime = Date('Y-m-d H:i:s');
$randGen=count(glob("hero/*"));
$q = $_SESSION['ID'] ?? null;
$passlogout =0;
if ($passlogout==1){
  header("refresh:5; Location:logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Erinn Szarek</title>
  <meta name="description" content="Erinn Szarek: Cycle 1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="Erinn Szarek: Cycle 1">

  <link rel="stylesheet" href="css/normalize.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="css/background.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<section class="bird">
    <div id="vanta-canvas"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.birds.min.js"></script>

</section>
<div id="hello">
  <h1>Erinn Szarek</h1>
  <h2>Cycle 3</h2>
</div>
<nav>

  <?php
  echo "<ul>";
  echo ($currentFile == "index.php") ? "<li><span class='navpage'>Home</span></li></li>" : "<li><a href='index.php'>Home</a></li>";
  echo "
        <li class='nav-item dropdown show navpage'>
        <a class='nav-link dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' 
        aria-haspopup='true' aria-expanded='false'>All Species Views}</a>
        <!-- dropdown items -->
          <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
            <a class='dropdown-item' href='withByWithout.php?'>Species and photos</a>
            <a class='dropdown-item' href='allSightings.php?'>All Species Seen</a>
            <a class='dropdown-item' href='withPhotos.php?'>Species With photos</a>
            <a class='dropdown-item' href='withoutPhotos.php'>Species Without photos</a>

          </div>
        </li>
        ";


  echo "</ul>";
  ?>

</nav>
<main class="content">








