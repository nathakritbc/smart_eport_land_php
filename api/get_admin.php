  <?php
    
     include_once "../configs/config_cors.php";
     include_once "../configs/connect_db.php";

     $requestMethod = $_SERVER["REQUEST_METHOD"];

     //ตรวจสอบว่าเป็น Method GET หรือไม่
     if ($requestMethod == 'GET') {
     $sql = "SELECT * FROM  `user_table`;";
     //ตรวจสอบการส่งค่า id
     if (isset($_GET['id'])) { 
             $id = $_GET['id']; 
             $sql = "SELECT * FROM `user_table` WHERE uid = '$id';";
     } 
    $result = mysqli_query($conn, $sql);
     //สร้างตัวขึ้นมาเพื่อรอรับข้อมูล
    $arr;
     while ($row = mysqli_fetch_assoc($result)) {
             // รับข้อมูลเเล้ว Push ใส่ array
             $arr[] = $row;
     }

     //นำข้อมูลเเสดงออกเป็น Json Data
     echo json_encode($arr);
    } 