<?php
  session_start();
  include("includes/database.php");

  $quoteId = $_GET['id'];
  $userId = $_SESSION["user_id"];

  $stmt = $pdo->prepare("SELECT * FROM `Favourite` WHERE `user_id`=$userId AND `quote_id`=$quoteId;");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row['favourite'] == "false"){
    header('Location: index.php');

  } else if ($row['favourite'] == "true") {
    $stmt2 = $pdo->prepare("UPDATE `Favourite` SET `favourite`='false' WHERE `user_id`=$userId AND `quote_id`=$quoteId;");
    $stmt2->execute();
    header('Location: index.php');

  } else {
    $stmt3 = $pdo->prepare("INSERT INTO `Favourite`(`user_id`, `quote_id`, `favourite`) VALUES ($userId, $quoteId, 'false');");
    $stmt3->execute();
    header('Location: index.php');
  }
 ?>
