<?php
  $classifList = '<select name="classificationId" id="classificationId">'; 
  foreach ($classifications as $classification) { 
    $classifList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
     if($classification['classificationId'] === $classificationId){
      $classifList .= ' selected ';
     }
   }
   $classifList .= ">$classification[classificationName]</option>";
   }
   $classifList .= '</select>'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

    <title>PHP Motors | Add Vehicle</title>
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
                <h1>Add Vehicle</h1>

                <form class="modal-content" action="/phpmotors/vehicles/index.php" method="post">
                    <div class="form-container">
                        <div class="input-group">
                        <?php
                            if (isset($message)  &&  isset($_POST['submit'])){
                                echo $message;
                            }                    
                        ?>
                        <br>
                        <br>


                            <label for="classificationId">Choose Classification Name:<?php
                                echo $classifList
                            ?></label>
                        </div>
                        <div class="input-group">
                            <label for="invMake">Make:
                            <input type="text" name="invMake" id="invMake" placeholder=""  required></label>
                            <label for="invModel">Model:
                            <input type="text" name="invModel" id="invModel" placeholder=""  required></label>
                            <label for="invDescription">Description:
                            <textarea name="invDescription" id="invDescription" placeholder="enter text here..." required></textarea></label>
                            <label for="invImage">Image:
                            <input type="text" name="invImage" id="invImage" ></label>
                            <label for="invThumbnail">ImageThumbnail:
                            <input type="text" name="invThumbnail" id="invThumbnail"  required></label>
                            <label for="invPrice">Price:
                            <input type="text" name="invPrice" id="invPrice" placeholder=""  required></label>
                            <label for="invStock">Stock:
                            <input type="text" name="invStock" id="invStock" placeholder=""  required></label>
                            <label for="invColor">Color:
                            <input type="text" name="invColor" id="invColor" placeholder=""  required></label>
                        </div>
                            <input type="submit" class="btn" name="submit" value="Add Vehicle">
                            <input type="hidden" name="action" value="add-vehicle">
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