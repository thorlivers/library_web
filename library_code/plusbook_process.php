<?php
  require 'config.php';
  date_default_timezone_set('Asia/Bangkok');
  $book_isbn = $_GET["bookisbn"];
  $barcode = date("YmdHis");
  $sql = "INSERT INTO book_amount (book_a_code, book_isbn)
          VALUES ('$barcode', '$book_isbn')";
  if ($conn->query($sql) === TRUE) {
      header('Location: listbook.php');
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
?>
