<?php
  session_start();
  include("includes/header.php");
  include('includes/navbar.php');
?>
  <div class="generator-container">
    <h3>Hit the Generate button to receive a random quote</h3>
    <form action="process-generate.php" method="post">
      <input class="btn-generate" type="submit" name="generate" value="Generate">
    </form>
  </div>
<?include("includes/footer.php");?>
