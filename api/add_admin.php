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
                        $a_full_name = mysqli_real_escape_string($conn, $result['a_full_name']);
                        $a_username = mysqli_real_escape_string($conn, $result['a_username']);
                        $password = mysqli_real_escape_string($conn, $result['a_password']);
                        //  $hashed_password  = password_hash($password, PASSWORD_BCRYPT);
                        //  $a_password=$hashed_password;
                        // $a_password = md5($password);  
                        /* Secure password hash. */
                        $a_password = password_hash($password, PASSWORD_DEFAULT);
                        //คำสั่ง SQL สำหรับเพิ่มข้อมูลใน Database
                        // $sql = "INSERT INTO `user_table` (`uid`, `first_name`, `username`, `pass_word`,'role','u_status') 
                        //         VALUES (NULL, '$a_full_name', '$a_username', '$a_password','100','0');";

                        $sql ="INSERT INTO `user_table` (`uid`, `username`, `pass_word`, `first_name`, `last_name`, `user_type_id`, `role`, `u_status`, `token`) 
                               VALUES (NULL, '$a_username', '$a_password', '$a_full_name', '', NULL, NULL, NULL, NULL);";

                        if (mysqli_query($conn, $sql)) {
                                echo json_encode([
                                        'status' => 200,
                                        'message' => 'create record successfully',
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