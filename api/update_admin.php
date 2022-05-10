  <?php
    
     include_once "../configs/config_cors.php";
     include_once "../configs/connect_db.php";

        //อ่านข้อมูลที่ส่งมาแล้วเก็บไว้ที่ตัวแปร data
        $data = file_get_contents("php://input");

        //แปลงข้อมูลที่อ่านได้ เป็น array แล้วเก็บไว้ที่ตัวแปร result
        $result = json_decode($data, true);

     $requestMethod = $_SERVER["REQUEST_METHOD"];

     if(isset($_GET["id"])){
        $id=$_GET["id"];
        
        //ตรวจสอบว่าเป็น Method GET หรือไม่
        if ($requestMethod == 'POST') {

                            $a_full_name = mysqli_real_escape_string($conn, $result['a_full_name']);
                            $a_username = mysqli_real_escape_string($conn, $result['a_username']);
                            
                            //คำสั่ง SQL สำหรับเพิ่มข้อมูลใน Database
                            $sql = "UPDATE `admin` a SET   a_full_name='$a_full_name' , a_username='$a_username' 
                                    WHERE id='$id';";

                            if (mysqli_query($conn, $sql)) { 
                                            session_start();
                                            // session_unset($_SESSION["a_full_name"]);
                                            // session_unset($_SESSION["a_username"]); 
                                            unset($_SESSION['a_full_name']);
                                            unset($_SESSION['a_username']);
                                            $_SESSION["a_full_name"] = $a_full_name;  
                                            $_SESSION["a_username"] = $a_username; 
                                            // $_SESSION["a_username"] = $a_username;   
                                    echo json_encode([
                                            'status' => 200,
                                            'message' => 'update record successfully',
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
     }