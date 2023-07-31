<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

    }if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
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
        <?php if (isset($message) && isset($_POST['submit'])) {
          echo $message;
        } 
        if (isset($_SESSION['message'])) {
          $message = $_SESSION['message'];
         }?>


        <div class="form-header">
          <h1>Update Account</h1>
          <form class="modal-content" action="/phpmotors/accounts/index.php" method="post">
            <div class="form-container">
              <div class="input-group">
                <h2>Account Update</h2>

                <label for="clientFirstname">Name:
                  <input type="text" name="clientFirstname" id="clientFirstname" required
                    value="<?php echo $_SESSION['clientData']['clientFirstname']; ?>">
                </label>
                <label for="clientLastname">Last Name:
                  <input type="text" name="clientLastname" id="clientLastname" required
                    value="<?php echo $_SESSION['clientData']['clientLastname']; ?>"></label>
                <label for="clientEmail">Email:
                  <input type="email" name="clientEmail" id="clientEmail" required
                    value="<?php echo $_SESSION['clientData']['clientEmail']; ?>"></label>

                <input type="submit" class="btn" name="submit" id="btn" value="Update Info">
                <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
                <input type="hidden" name="action" value="updateClient">
              </div>
            </div>
          </form>
        </div>
        <form class="modal-content" action="/phpmotors/accounts/index.php" method="post">
          <div class="form-container">
            <?php 
                if (isset($_SESSION['message'])) {
                  $message = $_SESSION['message2'];
                 }
                 
            ?>

            <h2>Update Password</h2>
            <p> Password contains one upper case, one lower case, one digit[0-9],
              one special character[#?!@$%^&*-] and the minimum length should be 8.</p>

            <label for="clientPassword">Password:
              <input type="password" name="clientPassword" id="clientPassword" required></label>
            <p>Note: Your original password will be changed</p>
            <input type="submit" class="btn" name="submit" value="Update Password">
            <input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
            <input type="hidden" name="action" value="updatePassword">
          </div>
        </form>
      <div class="back">
        <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"> </div>
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