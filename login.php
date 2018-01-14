<?php
session_start();
  include("includes/header.php");
  include('includes/navbar.php');
?>
<div>
  <h1 class="login">Login</h1>
</div>
<div class=signup>
  <form action="process-login.php" method="POST">
    <p>
      Username<input type="text" name="username" required/>
    </p>
    <p>
      Password<input type="password" name="password" required/>
    </p>
    <input type="submit" />
  </form>
</div>

<? include('includes/footer.php'); ?>
