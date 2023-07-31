<?php
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

    <title>PHP Motors | Template</title>
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
        <form action="#" method="POST">

<h5 class="text-success">
    
<?php 
    if(isset($update_msg)){
        echo $update_msg;
    }
?>
</h5> <br> <br>
<?php if(isset($reviewDisplay)){
              echo $reviewDisplay;
              } ?>
        <h5>User Id: <?php echo $row['clientId'] ?> </h5> <br>
        <h5>User Name: <?php echo $row['user_name'] ?> </h5> <br>
        <h5>Product Id: <?php echo $row['pdt_id'] ?> </h5> <br>

        <h5>Review: </h5> <br>
        
   

    <div class="form-group">
        <input type="hidden" name="cmt_id" value="<?php echo $row['id'] ?>">
        <textarea name="u_comment" id="" cols="30" rows="10"><?php echo $row['comment'] ?></textarea>
    </div>

    <div class="form-group">
    <input type="submit" name="submit" value="Edit Review">
    <input type="hidden" name="action" value="reviewEdit">
    </div>

    
</form>

        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
    <script src="/phpmotors/js/main.js" type="text/javascript"></script>
</body>

</html>