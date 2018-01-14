<?php
  session_start();
  include("includes/header.php");
  include("includes/database.php");
  include("includes/navbar.php");

  $userId = $_SESSION['user_id'];
  $username = $_SESSION['username'];
  //Here we inner join the quote and favourites tables based on the quote id where the user id fromt he favrouite table matches our users id
  $stmt = $pdo->prepare("SELECT `Quote`.`quoteText`,`Quote`.`id`
                         FROM `Quote` INNER JOIN `Favourite`
                         ON `Quote`.`id`=`Favourite`.`quote_id`
                         WHERE `Favourite`.`user_id` = $userId;");
  $stmt->execute();

?>
  <section class="favourites-container">
    <h3><?=$username?>'s favourite quotes</h3>
    <ul>
      <?
        while($row = $stmt->fetch()){
          ?>
            <li><p><?=$row['quoteText']?></p> <a class="quote-favourite" href="process-remove-favourite.php?id=<?=$quoteId?>"><span> Remove From Favourites</span></a></li>
          <?
        }
      ?>
    </ul>
  </section>
<?
  include("includes/footer.php");
?>
