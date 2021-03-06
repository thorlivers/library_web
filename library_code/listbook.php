<?php
  require 'session_staff.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Modern Business - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="dash.php">Dash</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php require 'nav.php'; ?>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">รายการหนังสือ
      <!-- <small>Subheading</small> -->
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dash.php">Home</a>
      </li>
      <li class="breadcrumb-item active">รายการหนังสือ</li>
    </ol>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Book ISBN</th>
          <th scope="col">Book Title</th>
          <th scope="col">Book Category</th>
          <th scope="col">Left/Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

            require 'config.php';


            $sql = "SELECT book.book_id AS book_id,
                           book.book_isbn AS book_isbn,
                           book.book_title AS book_title,
                           book.book_category_id AS book_category_id,
                           book_category.book_category_name AS book_category_name
                    FROM book
                    INNER JOIN book_category
                    ON book.book_category_id=book_category.book_category_id
                    ORDER BY book.book_id DESC";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row["book_id"]."</td>
                          <td>".$row["book_isbn"]."</td>
                          <td>".$row["book_title"]."</td>
                          <td>".$row["book_category_name"]."</td>";

                          $sql2 = "SELECT COUNT(book_isbn) AS amount, book_a_code FROM book_amount WHERE book_isbn=$row[book_isbn] AND book_a_code NOT IN (SELECT book_a_code FROM borrowing WHERE status=1)";
                          $result2 = $conn->query($sql2);
                          if ($result2->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {
                              $book_left = $row2["amount"];
                            }
                          } else {
                            $book_left = "0";
                          }

                          $sql3 = "SELECT COUNT(book_isbn) AS amount, book_a_code FROM book_amount WHERE book_isbn=$row[book_isbn]";
                          $result3 = $conn->query($sql3);
                          if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {
                              $book_all = $row3["amount"];
                            }
                          } else {
                            $book_all = "0";
                          }

                  echo  "<td><span class='badge badge-pill badge-warning'>".$book_left."</span> / <span class='badge badge-pill badge-success'>".$book_all."</span> เล่ม</td>
                         <td> <a href='plusbook_process.php?bookisbn=$row[book_isbn]' class='btn btn-primary btn-sm'>+</a>
                              <a href='listbook_amount.php?bookisbn=$row[book_isbn]' class='btn btn-primary btn-sm'>บาร์โคด</a>
                              <a href='editform.php?bookid=$row[book_id]' class='btn btn-warning btn-sm'>แก้ไข</a>
                              <a href='delete_process.php?bookisbn=$row[book_isbn]' class='btn btn-danger btn-sm'>ลบ</a>
                          </td>
                        </tr>
                       ";
                }
            } else {
                echo "0 results";
            }
            $conn->close();

        ?>

      </tbody>
    </table>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
