<?php
  if (isset($_POST["book_a_code"])) {
    require 'config.php';
    date_default_timezone_set('Asia/Bangkok');
    $book_a_code = $_POST["book_a_code"];
    $bo_id = $_POST["bo_id"];
    $st_id = $_POST["st_id"];
    $date = new DateTime();
    $borrow_date = $date->format('Y-m-d H:i:s');
    $period_date = $_POST["period_date"];
    $status = "1";

    // ทำการตรวจสอบว่าบาร์โคดนั้นมีให้ยืมหรือไม่
    $sql_check = "SELECT book_a_code, status FROM borrowing WHERE book_a_code=$book_a_code AND status=1";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows == 0) {

        // เมื่อพบว่ามีบาร์โคดนั้นอยู่ในระบบ ก็สามารถทำการยืมหนังสือได้
        $sql = "INSERT INTO borrowing (book_a_code, bo_code, st_id, borrow_date, period_date, status)
        VALUES ('$book_a_code','$bo_id','$st_id','$borrow_date' ,'$period_date','$status')";
        if ($conn->query($sql) === TRUE) {
          header('Location: borrowlist.php');
        } else {
              echo "<script>alert('ไม่สามารถทำการยืมได้กรุณาลองใหม่อีกครั้ง หรือไม่พบบาร์โคดที่ท่านกรอก');</script>";
        }
        $conn->close();

    } else {
        echo "<script>alert('ไม่พบหนังสือเล่มนี้ในระบบ');</script>";
    }
    $conn->close();
  }
?>
