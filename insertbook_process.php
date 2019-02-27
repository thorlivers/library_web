<?php
  if (isset($_POST["bookinsert"])) {
    require 'config.php';

    $bookisbn = $_POST["bookisbn"];
    $booktitle = $_POST["booktitle"];
    $bookcategory = $_POST["bookcategory"];
    $bookpublishing = $_POST["bookpublishing"];

    $sql = "INSERT INTO book (book_isbn, book_title, book_category_id, book_publishing)
    VALUES ('$bookisbn', '$booktitle', '$bookcategory', '$bookpublishing')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: insertbook.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
?>
