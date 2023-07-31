<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Server Error | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>
    <div class="container">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        </header>
        <nav>
            <ul class="nav">
<li><a href="/phpmotors/accounts?action=home" title="PHP Motors home page">Home</a></li>
<li><a href="/phpmotors/accounts?action=classic" title="clasic cars page">Classic</a></li>
<li><a href="/phpmotors/accounts?action=sports" title="sports cars">Sports</a></li>
<li><a href="/phpmotors/accounts?action=suv" title="sports utility vehicles">SUV</a></li>
<li><a href="/phpmotors/accounts?action=trucks" title="trucks">Trucks</a></li>
<li><a href="/phpmotors/accounts?action=used" title="used cars">Used</a></li>
</ul>
        </nav>
        <main>
            <div class="main">
                <h1>Server Error</h1>
                <p>Sorry our server seems to be experiencing some technical difficulties
                </p>
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