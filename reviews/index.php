<?php
/* reviews Controller */

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

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {
    case 'addReview':
              // Filter and store the data
              $clientId = filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT);
              $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_VALIDATE_INT);

              if (empty($reviewText)) {
                $message = '<span class="error">Field must not be empty.</span>';
                include '../view/vehicle-detail.php';
                exit;
              }
              if(!is_numeric($clientId)) {
                $message = '<span class="error">Please provide information for all empty form fields. '.$classificationId.'</span>';
                include '../view/vehicle-detail.php';
                exit;
              }
              $review = addReview($clientId, $reviewText);

        
              // Send the data to the model
      
     
            if (!count($review)>1) {
              $message = "<span class='success'>review added Successfully.</span>";
              include '../view/vehicle-detail.php';
              exit;
            } else {
              $message = '<span class="error"> Write a review.</span>';
              include '../view/vehicle-detail.php';
              exit;
            }
            break;
      
    case 'review':
      $clientId = filter_input(INPUT_GET, 'clientId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $review = getReviews($clientId);
      if($review){
        $message = "<p class='notice'>Sorry, no $review could be found.</p>";
      } else {
        $reviewDisplay = buildRviewDisplay($review);
      }
        include '../view/vehicle-detail.php';
        break;

    case 'editReview':
      $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);
      $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
      $reviewDate = filter_input(INPUT_POST, 'reviewDate', FILTER_SANITIZE_STRING);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_VALIDATE_INT);
      
      if (empty($reviewId) || empty($reviewText) || empty($clientId) || empty($reviewDate) || empty($invId)) {
        $message = '<p class="error">Please complete all information for the item! Double check the classification of the item.</p>';
         include '../view/review-edit.php';
       exit;
      }
      
      $updateResult = updateReview($reviewId, $reviewText, $clientId, $invId, $reviewDate);
      if ($updateResult) {
       $message = "<p class='success'>successfully updated.</p>";
        $_SESSION['message'] = $message;
        header('location: .');
        exit;
      } else {
        $message = "<p class='error'>Error. not updated.</p>";
        include '../view/review-edit.php';
         exit;
        }
        break;
  
    case 'delete':
      $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);
      $Result = deleteReview($reviewId);
      header('location: .');
      break;

    default:
    $classificationList = buildClassificationList($classifications);
      include '../view/vehicle-detail.php';
      break;
  
      }
?>