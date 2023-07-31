<?php if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
    }
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
        <h1><?php if(isset($invInfo['invMake'])){ 
	                  echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
          <form class="modal-content" method="post" action="/phpmotors/vehicles/">
          <div class="form-container">
                        <div class="input-group">
            <p>* Confirm Vehicle Deletion. The delete is permanent.</p>
              <label for="invMake">Vehicle Make</label>
              <input type="text" readonly name="invMake" id="invMake" <?php
                if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>

              <label for="invModel">Vehicle Model</label>
              <input type="text" readonly name="invModel" id="invModel" <?php
                if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>

              <label for="invDescription">Vehicle Description</label>
              <textarea name="invDescription" readonly id="invDescription"><?php
                if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
                ?></textarea>


              <input type="submit" class="btn" name="submit" value="Delete Vehicle">

              <input type="hidden" name="action" value="deleteVehicle">
              <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
                echo $invInfo['invId'];} ?>">
                

              </div>
              </div>
          </form>
              </div>
        <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

    </main>
    <hr>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
  </div>
  <script src="/phpmotors/js/main.js"></script>
</body>

</html>