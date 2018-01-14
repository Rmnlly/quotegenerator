<?php?>
<nav class="navbar">
  <h1 class="title">
    <a href="index.php">R&M Quote Generator</a>
  </h1>
  <ul>
    <?if($_SESSION['authenticated'] == true){
      ?>
      <li><a href="user-account.php">My Account</a></li>
      <li><a href="process-logout.php">Logout</a></li>
      <?
    } else {
      ?>
      <li><a href="signup.php">Sign Up</a></li>
      <li><a href="login.php">Login</a></li>
      <?
    }
    ?>
  </ul>
</nav>
