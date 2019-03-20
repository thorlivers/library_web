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
    <h1 class="mt-4 mb-3">ยืมหนังสือ
      <!-- <small>Subheading</small> -->
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dash.php">Home</a>
      </li>
      <li class="breadcrumb-item active">ยืมหนังสือ</li>
    </ol>
    <form action="borrow_process.php" method="post">
      <input type="hidden" class="form-control" name="st_id" value="<?php echo $st_id; ?>">
      <div class="form-group">
        <label for="exampleInputEmail1">กรอกบาร์โคดหนังสือ</label>
        <input type="text" class="form-control" name="book_a_code" placeholder="กรุณากรอกบาร์โคดหนังสือที่ต้องการยืม">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ผู้ยืม</label>
        <input type="text" class="form-control" name="bo_id" placeholder="กรุณกรอกรหัสผู้ยืม">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">กำหนดวันคืนหนังสือ</label>
        <input type="date" class="form-control" name="period_date" placeholder="กรุณากรอกวันที่พิมพ์">
      </div>
      <button type="submit" class="btn btn-primary">ทำการยืม</button>
    </form>


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
