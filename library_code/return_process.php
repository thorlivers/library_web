<?php
  require 'config.php';
  date_default_timezone_set('Asia/Bangkok');

  $book_a_code = $_GET["book_a_code"];
  $date = new DateTime();
  $return_date = $date->format('Y-m-d H:i:s');

  $sql = "UPDATE borrowing SET return_date='$return_date', status='2' WHERE book_a_code='$book_a_code'";

  if ($conn->query($sql) === TRUE) {
      header('Location: returnlist.php');
  } else {
      echo "Error updating record: " . $conn->error;
  }
  $conn->close();
?>
