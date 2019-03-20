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
    <h1 class="mt-4 mb-3">แก้ไขหนังสือ
      <!-- <small>Subheading</small> -->
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">แก้ไขหนังสือ</li>
    </ol>

    <?php
      require 'config.php';
      $bookid = $_GET["bookid"];
      $sql = "SELECT * FROM book WHERE book_id=$bookid";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $bookisbn = $row["book_isbn"];
            $booktitle = $row["book_title"];
            $bookcategory = $row["book_category_id"];
            $bookpublishing = $row["book_publishing"];
          }
      } else {
          echo "0 results";
      }
      $conn->close();
    ?>

    <form name="bookedit" method="post" action="edit_process.php">
      <div class="form-group">
        <input type="hidden" name="bookid" value="<?php echo $bookid; ?>">
        <label for="exampleInputEmail1">กรอก ISBN</label>
        <input type="text" class="form-control" name="bookisbn" value="<?php echo $bookisbn; ?>" placeholder="กรุณากรอกชื่อ ISBN" readonly="readonly">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">กรอกชื่อหนังสือ</label>
        <input type="text" class="form-control" name="booktitle" value="<?php echo $booktitle; ?>" placeholder="กรุณากรอกชื่อหนังสือ">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">กรอกหมวดหมู่</label>
        <select class="form-control" name="bookcategory">
          <?php
            require 'config.php';
            $sql = "SELECT * FROM book_category";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if ($bookcategory == $row["book_category_id"]) {
                    echo "<option value='$bookcategory' selected>$row[book_category_id] $row[book_category_name]</option>";
                  } else {
                    echo "<option value='$row[book_category_id]'>$row[book_category_id] $row[book_category_name]</option>";
                  }
                }
            } else {
                echo "<option>ไม่พบข้อมูล</option>";
            }
            $conn->close();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">กรอกวันที่พิมพ์</label>
        <input type="date" class="form-control" name="bookpublishing" value="<?php echo $bookpublishing; ?>" placeholder="กรุณากรอกวันที่พิมพ์">
      </div>
      <button type="submit" class="btn btn-primary" name="bookinsert">แก้ไขหนังสือ</button>
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
