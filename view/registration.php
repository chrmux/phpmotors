<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">

    <title>PHP Motors | Registration</title>
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
                <h1>Register</h1>
                <?php
                    if (isset($message)) {
                        echo $message;
                       }
                ?>
                <form class="modal-content" action="/phpmotors/accounts/index.php" method="post">
                    <div class="form-container">
                        <label for="clientFirstname">Name:
                        <input type="text" name="clientFirstname" id="clientFirstname" placeholder="First Name" required></label>                        
                        <label for="clientLastname">Last Name:
                        <input type="text" name="clientLastname" id="clientLastname" placeholder="Last Name" required></label>
                        <label for="clientEmail">Email:
                        <input type="email" name="clientEmail" id="clientEmail" placeholder="Enter a valid email address" required></label>
                        <label for="clientPassword">Password:
                        <input type="password" name="clientPassword" id="clientPassword" required></label>
                        <span> Password contains one upper case, one lower case, one digit[0-9],
                            one special character[#?!@$%^&*-] and the minimum length should be 8.</span>

                        <input type="submit" class="btn" name="submit" id="regbtn" value="Register">
                        <input type="hidden" name="action" value="Register">
                    </div>
                    <div class="form-container">
                        <span>Already have an account? <a href="/phpmotors/accounts?action=login-page">Login
                                here</a>.</span>

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