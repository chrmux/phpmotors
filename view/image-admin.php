<?php

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Image Management | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">
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
            <div class="form-header">
                <h1>Image Management Here</h1>
                <div class="form-container" id="management">

                    <p>Choose one of the option below:</p>
                    <h2>Add New Vehicle Image</h2>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }                    
                ?>
                    <form class="modal-content" action="/phpmotors/uploads/" method="post"
                        enctype="multipart/form-data">
                        <label for="invId">Vehicle</label>
                        <?php echo $prodSelect; ?>
                        <fieldset>
                            <label>Is this the main image for the vehicle?</label>
                            <label for="priYes" class="pImage">Yes
                                <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1"></label>
                            <label for="priNo" class="pImage">No
                                <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked
                                    value="0"></label>
                        </fieldset>
                        <label>Upload Image: </label>
                        <input type="file" name="file1">
                            <input type="submit" class="regbtn" value="Upload">
                            <input type="hidden" name="action" value="upload">

                    </form>

                    <div class="gallery-detail">
                        <hr>
                        <h2>Existing Images</h2>
                        <p class="warning">If deleting an image, delete the thumbnail too and vice versa.</p>
                        <?php
                    if (isset($imageDisplay)) {
                    echo $imageDisplay;
                    } ?>
                    </div>
                    <div class="back">
                        <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">
                    </div>
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

<?php unset($_SESSION['message']); ?>