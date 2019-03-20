<?php
  require 'config.php';
  $bookisbn = $_GET["bookisbn"];

  $sql = "DELETE book, book_amount FROM book INNER JOIN book_amount
          WHERE book.book_isbn=book_amount.book_isbn and book.book_isbn='$bookisbn'";

  if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('ลบหนังสือเรียบร้อย'); window.location.href='listbook.php';</script>";
  } else {
      echo "<script>window.alert('หนังสือเล่มนี้มีรายการยืมคืนแล้ว ระบบไม่อนุญาตให้ลบ'); window.location.href='listbook.php';</script>";
  }

  $conn->close();
?>
