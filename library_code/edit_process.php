<?php

  require 'config.php';
  $bookid = $_POST["bookid"];
  $bookisbn = $_POST["bookisbn"];
  $booktitle = $_POST["booktitle"];
  $bookcategory = $_POST["bookcategory"];
  $bookpublishing = $_POST["bookpublishing"];

  $sql = "UPDATE book
          SET book_isbn='$bookisbn',
              book_title='$booktitle',
              book_category_id='$bookcategory',
              book_publishing='$bookpublishing'

          WHERE book_id=$bookid";

  if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('แก้ไขหนังสือเรียบร้อย'); window.location.href='listbook.php';</script>";
  } else {
      echo "<script>window.alert('ไม่สามารถแก้ไขหนังสือได้'); window.location.href='listbook.php';</script>";
  }
  $conn->close();

?>
