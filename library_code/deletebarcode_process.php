<?php
  require 'config.php';
  $book_a_code = $_GET["book_a_code"];

  $sql = "SELECT book_a_code, book_isbn FROM book_amount WHERE book_a_code=$book_a_code";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $book_isbn = $row["book_isbn"];

        $sql2 = "DELETE FROM book_amount WHERE book_a_code=$book_a_code";
        if ($conn->query($sql2) === TRUE) {
            header('Location: showamount.php?bookisbn='.$book_isbn.'');
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
  } else {
    echo "0 results";
  }
  $conn->close();

?>
