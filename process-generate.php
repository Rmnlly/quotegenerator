<?php
  session_start();
  include("includes/database.php");
  include("includes/header.php");
  include("includes/navbar.php");

  $stmt = $pdo->prepare("SELECT * FROM `Quote` ORDER BY RAND() LIMIT 1");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $quoteId = $row['id'];

  $stmt2 = $pdo->prepare("SELECT * FROM `Favourite` WHERE `quote_id` = $quoteId;");
  $stmt2->execute();
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
 ?>
 <div class="generator-container">
   <p><?=$row['quoteText']?></p>
   <form action="process-generate.php" method="post">
     <input class="btn-generate" type="submit" name="generate" value="Generate">
   </form>
   <?
     if($_SESSION["authenticated"] == 'true'){
       if($row2['favourite'] == "true"){
         ?>
         <a class = "quote-favourite" href="process-remove-favourite.php?id=<?=$quoteId?>"><span> Remove From Favourites</span></a>
         <?
       }else if($row2['favourite'] == "" || $row2['favourite'] == "false"){
         ?>
         <a class = "quote-favourite" href="process-favourite.php?id=<?=$quoteId?>"><span>Favourite</span></a>
         <?
       }
     }
   ?>
 </div>
<?include("includes/footer.php");?>
