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
    <?php $book_isbn = $_GET["bookisbn"]; ?>
    <h1 class="mt-4 mb-3">รายการจำนวนหนังสือ <a href='plusbook2_process.php?bookisbn=<?php echo $book_isbn; ?>' class='btn btn-primary btn-sm'>เพิ่ม</a>
      <!-- <small>Subheading</small> -->
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dash.php">Home</a>
      </li>
      <li class="breadcrumb-item active">รายการจำนวนหนังสือ</li>
    </ol>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Book ISBN</th>
          <th scope="col">Barcode ID</th>
          <th scope="col">Barcode</th>
          <th scope="col">Date Create</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
            include "barcode/BarcodeGenerator.php";
            include "barcode/BarcodeGeneratorHTML.php";
            require 'config.php';
            $book_isbn = $_GET["bookisbn"];
            $sql = "SELECT * FROM book_amount WHERE book_isbn=$book_isbn ORDER BY book_a_id DESC";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row["book_isbn"]."</td>
                          <td>".$row["book_a_code"]."</td>
                          <td>";
                            $code = $row["book_a_code"];
                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                            $border = 2;
                            $height = 30;
                            echo $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);
                            echo $code ;
                  echo "  </td>
                          <td>";
                            $sql2 = "SELECT book_a_code, status FROM borrowing WHERE book_a_code=$row[book_a_code] AND status=1";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                              echo "<span class='badge badge-pill badge-warning'>Borrowed</span>";
                            } else {
                              echo "<span class='badge badge-pill badge-success'>Available</span>";
                            }
                  echo "  </td>
                          <td>".$row["date_create"]."</td>
                          <td><a href='deletebarcode_process.php?book_a_code=$row[book_a_code]' class='btn btn-danger btn-sm'>ลบ</a></td>
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
