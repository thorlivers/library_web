<?php
  session_start();
  $st_id = $_SESSION["st_id"];
  if (!isset($_SESSION["st_id"])) {
    header('Location: session_destroy.php');
  }

  require 'config.php';
  $sql = "SELECT * FROM staff WHERE st_id=$st_id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $name = $row["fname"]." ".$row["lname"];
      }
  } else {
      $name = "ไม่พบข้อมูล";
  }
  $conn->close();




?>
