<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
   }
   if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

    <title>PHP Motors | Vehicle Management </title>
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
            <h1>Vehicle Management</h1>
            <ul class="add-vehicle">
                <li><a href="/phpmotors/vehicles?action=add-classification" title="Add classification page">Add
                        Classification</a></li>
                <li><a href="/phpmotors/vehicles?action=add-vehicle" title="Add vehicle page">Add Vehicle</a></li>
            </ul>
            <div class="form-container">

            <?php
            if (isset($message)) { 
            echo $message; 
            } 
            if (isset($classificationList)) { 
            echo '<h2>Vehicles By Classification</h2>'; 
            echo '<p>Choose a classification to see those vehicles</p>'; 
            echo $classificationList; 
            }
            ?>
            <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
            </noscript>
            <div class="input-group">
            <table id="inventoryDisplay"> </table>
            </div>
        </div>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
    <script src="../js/inventory.js"></script>
    <script src="/phpmotors/js/main.js"></script>
</body>

</html>

<?php unset($_SESSION['message']); ?>