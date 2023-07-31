<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

    <title>PHP Motors | Add Classification</title>
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
            <div class="add-class">

                <h1>Add Classification</h1>
                <form class="modal-content" action="/phpmotors/vehicles/index.php" method="post">
                    <div class="form-container">
                        <?php
                        if (isset($message)  &&  isset($_POST['submit'])){
                        echo $message;
                        }
                        ?>
                        <br>
                        <br>
                        <div class="input-group">

                            <label for="classificationName">Classification Name:</label>
                            <input type="text" id="classificationName" name="classificationName" required >

                            <input type="submit" class="btn" name="submit" value="Add Classification">
                            <input type="hidden" name="action" value="add-classification">
                        </div>
                    </div>
                </form>
            </div>
            <div class="back">
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