<?php
  session_start();
  include("includes/database.php");
  include("includes/header.php");
  include("includes/navbar.php");

  $stmt = $pdo->prepare("SELECT * FROM `Quote` ORDER BY RAND() LIMIT 1");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

 ?>
 <div class="generator-container">
   <p><?=$row['quoteText']?></p>
   <form action="process-generate.php" method="post">
     <input class="btn-generate" type="submit" name="generate" value="Generate">
   </form>
 </div>
<?include("includes/footer.php");?>
