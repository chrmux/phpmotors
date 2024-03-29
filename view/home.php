<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css" media="screen">
    <title>PHP Motors</title>
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
            <h1>Welcome to PHP Motors!</h1>

            <section id="delorean">
                <ul>
                    <li>
                        <h2>DMC Delorean</h2>
                    </li>
                    <li>3 Cup holders</li>
                    <li>Superman doors</li>
                    <li>Fuzzy dice!</li>
                    <li>
                        <a href="#" title="cart">
                            <img id="actionbtn" alt="Add to cart button" src="/phpmotors/images/site/own_today.png">
                        </a>
                    </li>
                </ul>
            </section>
            <div class="flex-content">
                <section class="review">
                    <h2>DMC Delorean Reviews</h2>
                    <ul>
                        <li>"So fast its almost like traveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4.5/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </section>
                <section class="add-ons">
                    <h2>Delorean Upgrades</h2>
                    <div class="flex">
                        <a href="#" title="flux-capacitor">
                            <figure>
                                <div class="add-col">
                                    <img src="/phpmotors/images/upgrades/flux-cap.png"
                                        alt="Picture of a flux capacitor">
                                </div>
                                <figcaption>Flux Capacitor</figcaption>
                            </figure>
                        </a>
                        <a href="#" title="flame decals">
                            <figure>
                                <div class="add-col">
                                    <img src="/phpmotors/images/upgrades/flame.jpg" alt="Picture of a flame decal">
                                </div>
                                <figcaption>Flame Decals</figcaption>
                            </figure>
                        </a>
                    </div>
                    <div class="flex">
                        <a href="#" title="bumper stickers">
                            <figure>
                                <div class="add-col">
                                    <img src="/phpmotors/images/upgrades/bumper_sticker.jpg"
                                        alt="Picture of Bumper Stickers">
                                </div>
                                <figcaption>Bumper Stickers</figcaption>
                            </figure>
                        </a>
                        <a href="#" title="hub caps">
                            <figure>
                                <div class="add-col">
                                    <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Picture of Hub Caps">
                                </div>
                                <figcaption>Hub Caps</figcaption>
                            </figure>
                        </a>
                    </div>
                </section>
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