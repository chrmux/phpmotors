<div class="flex-container">
<a class="logo" href="/phpmotors">
    <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo" id="logo"></a>
    <div class="acc">
      <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
      echo '<a class="acc" href="/phpmotors/accounts/">Welcome ' . $_SESSION['clientData']['clientFirstname'] . '</a>';
    }

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
      echo '<a href="/phpmotors/accounts?action=Logout">  | Logout</a>';
    } else {
      echo '<a href="/phpmotors/accounts?action=Login" title="Login or Register with PHP Motors" id="acc">My Account</a>';
    }
  ?>
</div>
</div>