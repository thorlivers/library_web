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
    <h1 class="mt-4 mb-3">รายการที่คืน
      <!-- <small>Subheading</small> -->
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dash.php">Home</a>
      </li>
      <li class="breadcrumb-item active">รายการที่คืน</li>
    </ol>

    <form action="return_process.php" method="get">
        <input type="text" class="form-control" name="book_a_code" placeholder="กรอกบาร์โคดหนังสือที่ต้องการคืน จากนั้นกด Enter"><br>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Book Barcode</th>
          <th scope="col">Borrower</th>
          <th scope="col">Staff</th>
          <th scope="col">Borrow Date</th>
          <th scope="col">Period Date</th>
          <th scope="col">Return Date</th>
          <th scope="col">Fines (Baht)</th>
        </tr>
      </thead>
      <tbody>

        <?php
            require 'config.php';
            $sql = "SELECT * FROM borrowing WHERE status=2 ORDER BY return_date DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row["book_a_code"]."</td>
                          <td>".$row["bo_code"]."</td>
                          <td>".$row["st_id"]."</td>
                          <td>".$row["borrow_date"]."</td>
                          <td>".$row["period_date"]."</td>
                          <td>".$row["return_date"]."</td>
                          <td>";

                          $begin = new DateTime($row["period_date"]);
                          $end = new DateTime($row["return_date"]);
                          $interval = new DateInterval('P1D');
                          $daterange = new DatePeriod($begin, $interval ,$end);
                          $counter = 0;
                          foreach($daterange as $date){
                              $counter++;
                          }

                          if ($counter == 1) {
                            echo "<span class='badge badge-pill badge-success'>0 ฿</span>";
                          } else {
                            $data = ($counter-1)*5;
                            echo "<span class='badge badge-pill badge-danger'>".$data." ฿</span>";
                          }

                  echo "  </td>
                          </td>
                        </tr>";
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
