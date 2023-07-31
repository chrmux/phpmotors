<?php
// Check for an existing email address

function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }
// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
    }

function buildNavigation($classifications)
  {
    $navList = '<div class="topnav" id="myTopnav">';
    $navList .= "<a href='/phpmotors' title='View the PHP Motors home page'>Home</a>";
    foreach ($classifications as $classification) {
    $navList .= "<a href='/phpmotors/vehicles/?action=classification&classificationName="
    .urlencode($classification['classificationName']).
    "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a>";
    }
    $navList .= '<a href="#" class="icon" onclick="myFunction()">≡</a>';
    $navList .= '</div>';
    return $navList;
  }

// Build the classifications select list 
function buildClassificationList($classifications){ 
    $classificationList = '<select name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
  }

function buildVehiclesDisplay($invId){
    $dv = '<div class="item">';
    foreach ($invId as $vehicle) {
    $dv .= '<ul>';
     $dv .= '<li>';
     $dv .= "<a href='/phpmotors/vehicles?action=vehicleDetails&vid=".urldecode($vehicle['invId'])."'><img src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
     $dv .= '<hr>';
     $dv .= "<a href='/phpmotors/vehicles?action=vehicleDetails&vid=".urldecode($vehicle['invId'])."'>$vehicle[invMake] $vehicle[invModel]</a>";
     $dv .= '<br>';     
     $dv .= '<br>';
     $formattedPrice = number_format($vehicle['invPrice'], 2);
     $dv .= "<span>$ $formattedPrice</span>";
     $dv .= '</li>';
     $dv .= '</ul>';
    }
    $dv .= '</div>';
    return $dv;
   }
  
function buildVehiclesDetails($invId){
  $dv = '<div class="gallery">';
  foreach ($invId as $imgId){
    $dv .= "<h1>$imgId[invMake] $imgId[invModel]</h1>";
    $dv .= '<div class="gallery-img">';
    $dv .= '<div class="thumb">';
    $dv .= "<img src='$imgId[invThumbnail]' alt='Image of $imgId[invMake] $imgId[invModel] on phpmotors.com'>";
    $dv .= "<img src='$imgId[imgPath]' alt='Image of $imgId[invMake] $imgId[invModel] on phpmotors.com'>";
    $dv .= '</div>';
     $dv .= '<br>';
     $dv .= '<div class="image">';
     $dv .= "<a><img src='$imgId[invImage]' alt='Image of $imgId[invMake] $imgId[invModel]'></a>";
     $formattedPrice = number_format($imgId['invPrice'], 2);
     $dv .= "<span>Price: $ $formattedPrice</span>"; 
     $dv .= '</div>';
    $dv .= "<br>";
    $dv .= '<div class="d-tails">';
    $dv .= '<br>';
    $dv .= '<div class="desc">';
    $dv .= "<h2>$imgId[invMake] $imgId[invModel]  Details</h2>";
    $dv .= "<p>$imgId[invDescription] $imgId[invDescription]</p>";
    $dv .= '<br>';
    $dv .= "<a>Color: <span>$imgId[invColor]</span></a>";
    $dv .= '<br>';
    $dv .= '<br>';
    $dv .= "<p>Stock: $imgId[invStock]</p>";
    $dv .= '</div>';
    $dv .= '</div>';
    $dv .= '</div>';
  }
  $dv .= '</div>';
    return $dv;
  }

   // week 12
 function buildThumbDisplay($invId){
  $dv = '<div class="thumb">';
  $dv .= '<div class="gallery-img">';
  $dv .= '<div class="thumb">';
  $dv .= "<a><img src='$imgId[invThumbnail]' alt='Image of $imgId[invMake] $imgId[invModel] on phpmotors.com'></a>";
  $dv .= "<a><img src='$imgId[imgPath]' alt='Image of $imgId[invMake] $imgId[invModel] on phpmotors.com'></a>";
  $dv .= '</div>';
   $dv .= '<br>';
   $dv .= '<div class="image">';
   $dv .= "<a><img src='$imgId[invImage]' alt='Image of $imgId[invMake] $imgId[invModel]'></a>";
   $formattedPrice = number_format($imgId['invPrice'], 2);
   $dv .= "<span>Price: $ $formattedPrice</span>"; 
   $dv .= '</div>';
  $dv .= "<br>";
  $dv .= '<div class="d-tails">';
  $dv .= '<br>';
  $dv .= '<div class="desc">';
  $dv .= "<h2>$imgId[invMake] $imgId[invModel]  Details</h2>";
  $dv .= "<p>$imgId[invDescription] $imgId[invDescription]</p>";
  $dv .= '<br>';
  $dv .= "<a>Color: <span>$imgId[invColor]</span></a>";
  $dv .= '<br>';
  $dv .= '<br>';
  $dv .= "<p>Stock: $imgId[invStock]</p>";
  $dv .= '</div>';
  $dv .= '</div>';
  $dv .= '</div>';
  return $dv;

}

function VehiclesDetails($invId){
  $dv = '<ul id="inv-detail">';
  foreach ($invId as $invId) {
   $dv .= '<li>';
   $dv .= "<img src='$invId[invImage]' alt='Image of $invId[invMake] $invId[invModel]'>";
   $dv .= '</li>';
   $dv .= "<h2>Vehicle Summury</h2>";
   $dv .= '<br>';
   $dv .= "<li>$invId[invMake] $invId[invModel]</li>";
   $dv .= '<br>';
   $dv .= "<li>Price: <span>$ $invId[invPrice]</span></li>";
   $dv .= '<br>';
   $dv .= "<li>Color: <span>$invId[invColor]</span></li>";
   $dv .= '<br>';
   $dv .= "<li>Stock: <span>$invId[invStock]</span></li>";
  }
  $dv .= '</ul>';
  return $dv;
}

/* * ********************************
*  Functions for working with images
* ********************************* */

// Adds "-tn" designation to file name
function makeThumbnailName($image) {
  $i = strrpos($image, '.');
  $image_name = substr($image, 0, $i);
  $ext = substr($image, $i);
  $image = $image_name . '-tn' . $ext;
  return $image;
 }

// Build images display for image management view
function buildImageDisplay($imageArray) {
  $id = '<ul id="image-display">';
  foreach ($imageArray as $image) {
   $id .= '<li>';
   $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
   $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
   $id .= '</li>';
  }
    $id .= '</ul>';
    return $id;
  }

// Build the vehicles select list
function buildVehiclesSelect($vehicles) {
  $prodList = '<select name="invId" id="invId">';
  $prodList .= "<option>Choose a Vehicle</option>";
  foreach ($vehicles as $vehicle) {
   $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
  }
  $prodList .= '</select>';
  return $prodList;
  }

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
  // Gets the paths, full and local directory
  global $image_dir, $image_dir_path;
  if (isset($_FILES[$name])) {
   // Gets the actual file name
   $filename = $_FILES[$name]['name'];
   if (empty($filename)) {
    return;
   }
  // Get the file from the temp folder on the server
  $source = $_FILES[$name]['tmp_name'];
  // Sets the new path - images folder in this directory
  $target = $image_dir_path . '/' . $filename;
  // Moves the file to the target folder
  move_uploaded_file($source, $target);
  // Send file for further processing
  processImage($image_dir_path, $filename);
  // Sets the path for the image for Database storage
  $filepath = $image_dir . '/' . $filename;
  // Returns the path where the file is stored
  return $filepath;
  }
 }

// Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename) {
  // Set up the variables
  $dir = $dir . '/';
 
  // Set up the image path
  $image_path = $dir . $filename;
 
  // Set up the thumbnail image path
  $image_path_tn = $dir.makeThumbnailName($filename);
 
  // Create a thumbnail image that's a maximum of 200 pixels square
  resizeImage($image_path, $image_path_tn, 200, 200);
 
  // Resize original to a maximum of 500 pixels square
  resizeImage($image_path, $image_path, 500, 500);
 }

// Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
     
  // Get image type
  $image_info = getimagesize($old_image_path);
  $image_type = $image_info[2];
 
  // Set up the function names
  switch ($image_type) {
  case IMAGETYPE_JPEG:
   $image_from_file = 'imagecreatefromjpeg';
   $image_to_file = 'imagejpeg';
  break;
  case IMAGETYPE_GIF:
   $image_from_file = 'imagecreatefromgif';
   $image_to_file = 'imagegif';
  break;
  case IMAGETYPE_PNG:
   $image_from_file = 'imagecreatefrompng';
   $image_to_file = 'imagepng';
  break;
  default:
   return;
 } // ends the swith
 
  // Get the old image and its height and width
  $old_image = $image_from_file($old_image_path);
  $old_width = imagesx($old_image);
  $old_height = imagesy($old_image);
 
  // Calculate height and width ratios
  $width_ratio = $old_width / $max_width;
  $height_ratio = $old_height / $max_height;
 
  // If image is larger than specified ratio, create the new image
  if ($width_ratio > 1 || $height_ratio > 1) {
 
   // Calculate height and width for the new image
   $ratio = max($width_ratio, $height_ratio);
   $new_height = round($old_height / $ratio);
   $new_width = round($old_width / $ratio);
 
   // Create the new image
   $new_image = imagecreatetruecolor($new_width, $new_height);
 
   // Set transparency according to image type
   if ($image_type == IMAGETYPE_GIF) {
    $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
    imagecolortransparent($new_image, $alpha);
   }
 
   if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
    imagealphablending($new_image, false);
    imagesavealpha($new_image, true);
   }
 
   // Copy old image to new image - this resizes the image
   $new_x = 0;
   $new_y = 0;
   $old_x = 0;
   $old_y = 0;
   imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
 
   // Write the new image to a new file
   $image_to_file($new_image, $new_image_path);
   // Free any memory associated with the new image
   imagedestroy($new_image);
   } else {
   // Write the old image to a new file
   $image_to_file($old_image, $new_image_path);
   }
   // Free any memory associated with the old image
   imagedestroy($old_image);
 } // ends resizeImage function


 // Build review display for image management view

function buildReviewDisplay($reviews) {
  $dataTable = '<thead id="reviewText">'; 
  foreach ($reviews as $element) {
    $dataTable .= "<tr><th>Review the $element[invModel]</th></tr>"; 
    $dataTable .= '</thead>'; 
    // Set up the table body 
    $dataTable .= '<tbody>';
    $string = subtring($element['clientfirstname'], 1);
  $dataTable .= "<tr>$string$element[clientfirstname] write on <td>$element[reviewDate]</td>"; 
     $dataTable .= "<td >$element[reviewText]</td></tr>"; 
  }
     $dataTable .= '</tbody>';
     return  $dataTable;
    }


function buildRviewManegement($reviewM) {
  $dataTable = '<tbody>'; 
  // Iterate over all vehicles in the array and put each in a row 
  foreach($reviewM as $element) { 
   $dataTable .= '<tr><td>${element.invMake} ${element.invModel}</td></tr>';
   $dataTable .= '<label for="invDescription">Description:';
    $dataTable .= '<textarea name="invDescription" id="invDescription" required></label>';
   $dataTable .= "<td ><a class='modify' href='/phpmotors/vehicles?action=mod&invId=$element[invId]' title='Click to modify'>Modify</a></td>"; 
  }
  $dataTable .= '</tbody>'; 
  // Display the contents in the Vehicle Management view 
         return  $dataTable;
        }

function buildRviewDisplay($array) {
  $id = '<ul id="review">';
  foreach ($array as $rview) {
    $string = substr($rview['clientFirstname'], 0);
    $id .= "<li style='justify-content space-around'>$string[0]$rview[clientLastname] $rview[reviewDate]</li>";
    $id .= "<textarea>$rview[reviewText]</textarea>";
  }
    $id .= '</ul>';
    return $id;
  }
?>