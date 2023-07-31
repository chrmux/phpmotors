<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

  <title>PHP Motors | Login</title>
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
        <h1>Login</h1>
        <?php
          if (isset($message)) {
            echo $message;
           }
        ?>
        <form class="modal-content" action="/phpmotors/accounts/" method="post">
          <div class="form-container">
            <label for="clientEmail">Email Address:</label>
            <input type="text" name="clientEmail" id="clientEmail" required>

            <label for="clientPassword">Password:</label>
            <input type="password" name="clientPassword" id="clientPassword" required>

            <input type="submit" name="submit" class="btn" value="Sign-in">
            <input type="hidden" name="action" value="Login">

          </div>

          <div class="form-container">
            <span>Don't have an account? <a href="/phpmotors/accounts?action=Register">Register</a>.</span>
          </div>
        </form>
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