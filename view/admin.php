<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

    <title>PHP Motors | Admin</title>
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
            <div class="form-header">
            <h1 class="margin1"><?php echo $_SESSION['clientData']['clientFirstname']; ?>
                <?php echo $_SESSION['clientData']['clientLastname']; ?></h1>
                <?php
                if (isset($_SESSION['message'])) {
                  $message = $_SESSION['message'];
                }
                if (isset($message)) { 
                  echo $message; 
                  }                 
                ?>
                <div class="user">
            <p>You are Logged in:</p>
              <ul>
                <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
                <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
              </ul>
              </div>
                    <div class="management">
                    <div class="client-update">
                  <h2 class="margin1">Account Management</h2>
                  <p class="margin1">Use this link to manage the account Information.</p>
                  <p class="margin1"><a href="/phpmotors/accounts?action=mod">Update Account Information</a></p>
                </div>
                <div class="reviews">
                  <h2 class="margin1">Management your Product Reviews</h2> 
                  <p ><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel']) && issset($reviewDisplay)){ 
                  echo "$reviewDisplay Modify $invInfo[invMake] $invInfo[invModel]";} 
                  elseif(isset($invMake) && isset($invModel)) { 
                    echo "$reviewDisplay Modify $invMake $invModel"; }?><a class='modify' href='/phpmotors/reviews?action=editReview&invId=invId' title='Click to modify'>Modify</a></p> 
                  <p ><a class='delete' href='/phpmotors/reviews?action=delete&invId=invId' title='Click to delete'>Delete</a></p>
                </div>
            <?php
                if ($_SESSION['clientData']['clientLevel'] > 1){
                  echo '
                <br>
                <div class="vehicle-man">
                  <h2 class="margin1">Inventory Management</h2>
                  <p class="margin1">Use this link to manage the inventory.</p>
                  <p class="margin1"><a href="/phpmotors/vehicles/">Vehicle Management</a></p>
                </div>
                <br>
                <div class="images-man">
                  <h2 class="margin1">Images Management</h2>
                  <p class="margin1">Use this link to manage the Images.</p>
                  <p class="margin1"><a href="/phpmotors/uploads/">Images Management</a></p>
                </div>';
                }
                  ?>  
                  </div> 
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