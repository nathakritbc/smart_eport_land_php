  <?php
     session_start(); 
     include_once "../configs/config_cors.php";
     include_once "../configs/connect_db.php";

        //อ่านข้อมูลที่ส่งมาแล้วเก็บไว้ที่ตัวแปร data
        $data = file_get_contents("php://input");

        //แปลงข้อมูลที่อ่านได้ เป็น array แล้วเก็บไว้ที่ตัวแปร result
        $result = json_decode($data, true);

     $requestMethod = $_SERVER["REQUEST_METHOD"];

     //ตรวจสอบว่าเป็น Method GET หรือไม่
     if ($requestMethod == 'POST') { 
                        $a_username = mysqli_real_escape_string($conn, $result['a_username']);
                        $password = mysqli_real_escape_string($conn, $result['a_password']); 

                        $sql = "SELECT * FROM `user_table` a WHERE username = '$a_username' LIMIT 1;";
                        $result = mysqli_query($conn, $sql); 
                         
                            if(mysqli_num_rows($result) > 0)  
                            {  
                                    while($row = mysqli_fetch_array($result))  
                                    {  
                                        if(password_verify($password, $row["pass_word"]))  
                                        {  
                                            //return true; 
                                            $_SESSION["id"] = $row["uid"]; 
                                            $_SESSION["a_full_name"] = $row["first_name"];  
                                            $_SESSION["a_username"] = $a_username;   
                                            // header("location:entry.php");  
                                            // echo "login success";
                                            echo json_encode([
                                                        'status' => 200,
                                                        'message' => 'login successfully',
                                                        'error' => false,
                                            ]);
                                        }  
                                        else  
                                        {  
                                            //return false;  
                                             http_response_code(404);
                                            //  echo "login fail";
                                            $mes = "Error: " . $sql . "<br>" . mysqli_error($conn);
                                            echo json_encode([
                                                    'status' => 404,
                                                    'message' => $mes,
                                                    'error' => true,
                                            ]);
                                        }  
                                    }  
                            }  
                            else  
                            {  
                                        //return false;  
                                             http_response_code(404);
                                            //  echo "login fail";
                                            $mes = "Error: " . $sql . "<br>" . mysqli_error($conn);
                                            echo json_encode([
                                                    'status' => 404,
                                                    'message' => $mes,
                                                    'error' => true,
                                            ]);
                            }  

                        

                        mysqli_close($conn);
    } 