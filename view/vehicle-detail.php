<?php

 if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
 }
 $classificationList = buildClassificationList($classifications);

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php if(isset($invId['invId'])){ 
	echo "Vehicle ID $invId[invId]";} ?> | PHP Motors, Inc.</title>
  <!-- device-width is the width of the screen in CSS pixels -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- screen is used for computer screens, tablets, smart-phones etc. -->
  <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
  <!--<link href="/phpmotors/css/product.css" type="text/css" rel="stylesheet" media="screen">-->
</head>

<body>
  <div class="container">
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
    </header>
    <nav>
      <?php echo $navList; ?>

    </nav>
    <main>
      <?php    if (isset($message)  &&  isset($_POST['submit'])){
             echo $message;    } 
        ?>
      <div class="responsive-detail">
        <?php if(isset($vehicleDetails)){
        echo $vehicleDetails;
        } ?>

        <br>
        <hr>

        <h2>Costumer Reviews</h2>  
        
        <div class="review-display">
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
              echo '<p>Screen name:' . $_SESSION['clientData']['clientFirstname'] . '</p>
              <form class="modal-content" action="/phpmotors/reviews/index.php" method="post">
              <div class="form-container">
              <label for="reviewText" >Review:
              <textarea name="reviewText" id="reviewText" rows="8" cols="40"></textarea></label>
              <p><input type="submit" name="submit" value="Submit Review"></p>
              <input type="hidden" name="action" value="addReview">
              </div>
          </form>';
            } else {
            echo '<p>You must <a href="/phpmotors/accounts?action=Login" title="Login or Register with PHP Motors" id="acc">login</a> to write a review</p>';
          }
        ?>
              <?php if(isset($reviewDisplay)){
              echo $reviewDisplay;
              } ?>
       </div>
      </div>
      <div class="back">
        <a href="/phpmotors">Back</a>
      </div>
    </main>
    <hr>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
  </div>
  <script src="/phpmotors/js/main.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>