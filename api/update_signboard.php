  <?php
    
     include_once "../configs/config_cors.php";
     include_once "../configs/connect_db.php";

     
        //อ่านข้อมูลที่ส่งมาแล้วเก็บไว้ที่ตัวแปร data
        $data = file_get_contents("php://input");

        //แปลงข้อมูลที่อ่านได้ เป็น array แล้วเก็บไว้ที่ตัวแปร result
        $result = json_decode($data, true);

     $requestMethod = $_SERVER["REQUEST_METHOD"];

     //ตรวจสอบว่าเป็น Method GET หรือไม่
     if ($requestMethod == 'POST') {
                        $id = mysqli_real_escape_string($conn, $result['id']);
                        $owner_id = mysqli_real_escape_string($conn, $result['owner_id']);
                        //คำสั่ง SQL สำหรับเพิ่มข้อมูลใน Database
                        $sql = "UPDATE signboard SET owner_id = '$owner_id' WHERE id='$id';";

                        if (mysqli_query($conn, $sql)) {
                                echo json_encode([
                                        'status' => 200,
                                        'message' => 'Update record successfully',
                                        'error' => false,
                                ]);
                        } else {
                                $mes = "Error: " . $sql . "<br>" . mysqli_error($conn);
                                echo json_encode([
                                        'status' => 500,
                                        'message' => $mes,
                                        'error' => true,
                                ]);

                        }

                        mysqli_close($conn);
    } 