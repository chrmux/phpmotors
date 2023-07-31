<?php if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
    }
    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
    }
    $classificationList = buildClassificationList($classifications);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

  <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	 echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
</head>

<body>
  <div class="container">
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
    </header>
    <nav>
      <?php echo $navList ?>
    </nav>
    <main>
      <div class="add-vehicle">
        <h1><?php
                if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
                    echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
                  elseif(isset($invMake) && isset($invModel)) { 
                    echo "Modify$invMake $invModel"; }?></h1>
        <?php if (isset($message) && isset($_POST['submit'])){
                        echo $message;
                        }?>
        <form class="modal-content" action="/phpmotors/vehicles/index.php" method="post">

          <div class="form-container">
            <p>* Note all Fields are Required</p>

            <div class="input-group">
              <label for="classificationList">Choose Classification Name:</label>
              <?php echo $classificationList; ?>
              <br>
              <label for="invMake">Make:
                <input type="text" name="invMake" id="invMake" required
                  <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>></label>

              <label for="invModel">Model:
                <input type="text" name="invModel" id="invModel" required
                  <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>></label>

              <label for="invDescription">Description:
                <textarea name="invDescription" id="invDescription" required>
<?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea></label>

              <label for="invImage">Image Path:
                <input name="invImage" id="invImage" type="text"
                  <?php if(isset($invImage)){echo "value='invImage'";}  ?>required></label>

              <label for="invThumbnail">Thumbnail Path:
                <input name="invThumbnail" id="invThumbnail" type="text"
                  <?php if(isset($invThumbnail)){echo "value='invThumbnail'";}  ?>required></label>

              <label for="invPrice">Price:
                <input name="invPrice" id="invPrice" type="text"
                  <?php if(isset($invPrice)){echo "value='invPrice'";}  ?>required></label>

              <label for="invStock">Stock:
                <input name="invStock" id="invStock" type="text"
                  <?php if(isset($invStock)){echo "value='invStock'";}  ?>required></label>

              <label for="invColor">Color:
                <input name="invColor" id="invColor" type="text"
                  <?php if(isset($invColor)){echo "value='invColor'";}  ?>required></label>

              <input type="submit" class="btn" name="submit" value="Update Vehicle">
              <input type="hidden" name="action" value="updateVehicle">
              <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
                echo $invInfo['invId'];} ?>">
            </div>
          </div>
        </form>
      <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
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