<?php
  if (isset($_POST["bookinsert"])) {
    require 'config.php';
    date_default_timezone_set('Asia/Bangkok');
    $bookisbn = $_POST["bookisbn"];
    $booktitle = $_POST["booktitle"];
    $bookcategory = $_POST["bookcategory"];
    $bookpublishing = $_POST["bookpublishing"];
    $barcode = date("YmdHis");


    $sql_check = "SELECT book_isbn FROM book WHERE book_isbn=$bookisbn";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
      echo "<script>window.alert('ไม่สามารถเพิ่มหนังสือได้ มี ISBN นี้ในระบบแล้ว กรุณาลองอีกครั้ง'); window.location.href='insertbook.php';</script>";
    } else {

      $sql = "INSERT INTO book (book_isbn, book_title, book_category_id, book_publishing)
      VALUES ('$bookisbn', '$booktitle', '$bookcategory', '$bookpublishing')";
      if ($conn->query($sql) === TRUE) {

          $sql2 = "INSERT INTO book_amount (book_a_code, book_isbn)
                  VALUES ('$barcode', '$bookisbn')";
          if ($conn->query($sql2) === TRUE) {
              echo "<script>window.alert('เพิ่มหนังสือเรียบร้อย'); window.location.href='listbook.php';</script>";
          } else {
              echo "<script>window.alert('ไม่สามารถเพิ่มบาร์โคดให้หนังสือได้ กรุณาลองอีกครั้ง'); window.location.href='listbook.php';</script>";
          } $conn->close();

      } else {
          echo "<script>window.alert('ไม่สามารถเพิ่มหนังสือได้ กรุณาลองอีกครั้ง'); window.location.href='insertbook.php';</script>";
      }
      $conn->close();
    }

  }
?>
