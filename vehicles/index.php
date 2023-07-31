<?php
/*
*Vehicles Controller 
*/
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
require_once '../model/vehicle-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);

// Get the value from the action name - value pair
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
  }
  
  switch ($action){
    case 'add-classification':
      // Filter and store the data
      $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      // Check for missing data
      if (empty($classificationName)) {
        $message = '<span class="error">Please provide information for an empty form fields.</span>';
        include '../view/add-classification.php';
        exit;
      }

      // Send the data to the model
      $add_action = addClassifications($classificationName);

      // Check and report the result
      if ($add_action == NULL) {
        header('Location: http://localhost/phpmotors/vehicles');
      } else {
        $message = "<span class='error'>Sorry $classificationName failed to add. Please try again.</span>";
        include '../view/add-classification.php';
        exit;
      }
      break;

      case 'add-vehicle':
        // Filter and store the data
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
  
        // Send the data to the model
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
        $message = '<span class="error">Please provide information for all empty form fields.</span>';
        include '../view/add-vehicle.php';
        exit;
      }

      if(!is_numeric($classificationId)) {
        $message = '<span class="error">Please provide information for all empty form fields. '.$classificationId.'</span>';
        include '../view/add-vehicle.php';
        exit;
      }

      $vehicleOutCome = addVehicles($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

      if ($vehicleOutCome !== TRUE) {
        $message = "<span class='success'>Vehicle added Successfully.</span>";
        include '../view/add-vehicle.php';
        exit;
      } else {
        $message = "<span class='error'>Please try again.</span>";
        include '../view/add-vehicle.php';
        exit;
      }
      break;

    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */ 
    case 'getInventoryItems': 
      // Get the classificationId 
      $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
      // Fetch the vehicles by classificationId from the DB 
      $inventoryArray = getInventoryByClassification($classificationId); 
      // Convert the array to a JSON object and send it back 
      echo json_encode($inventoryArray); 
      break;

    case 'mod':
      $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
      $invInfo = getInvItemInfo($invId);
      if(count($invInfo)<1){
        $message = 'Sorry, no vehicle information could be found.';
      }
      include '../view/vehicle-update.php';
      exit;
      break;

      case 'updateVehicle':
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        if (empty($classificationId) || empty($invMake) || empty($invModel) 
          || empty($invDescription) || empty($invImage) || empty($invThumbnail)
          || empty($invPrice) || empty($invStock) || empty($invColor)) {
        $message = '<p class="error">Please complete all information for the item! Double check the classification of the item.</p>';
         include '../view/vehicle-update.php';
       exit;
      }
      
      $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
      if ($updateResult) {
       $message = "<p class='success'>Congratulations, the $invMake $invModel was successfully updated.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/vehicles/');
        exit;
      } else {
        $message = "<p class='error'>Error. the $invMake $invModel was not updated.</p>";
         include '../view/vehicle-update.php';
         exit;
        }
      break;

      case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
          }
          include '../view/vehicle-delete.php';
          exit;
          break;

    case 'deleteVehicle':
      $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
      
      $deleteResult = deleteVehicle($invId);
      if ($deleteResult) {
        $message = "<p class='success'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/vehicles/');
        exit;
      } else {
        $message = "<p class='error'>Error: $invMake $invModel was not
      deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/vehicles/');
        exit;
      }
      break;

    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $vehicles = getVehiclesByClassification($classificationName);
        if(!count($vehicles)){
          $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
          $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }
        include '../view/classification.php';
        break;


      case 'vehicleDetails':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInventoryById($invId);

        if(!count($invInfo)){
        $message = "<p class='error'>Sorry, No invId $invId could be found.</p>";
        } else {
        $vehicleDetails = buildVehiclesDetails($invId);
        }
        include '../view/vehicle-detail.php';
        break;
              
        default:
        $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-man.php';
        break;

      }
      
?>

