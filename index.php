<?php
/*
*Main Controller 
*/
session_start();
// Get the database connection file
require_once 'library/connections.php';
require_once 'library/functions.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
 
$action = filter_input(INPUT_POST, 'action');
   if ($action == NULL){
$action = filter_input(INPUT_GET, 'action');
   }
  
   switch ($action){
    case 'error':
      include 'view/500.php';
     break;
   
   default:
    include 'view/home.php';
  } 
?>

