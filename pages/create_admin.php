<?php 
session_start();
if(isset($_SESSION["id"])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เพิ่ม Admin</title>
    <link rel="icon" type="image/x-icon" href="../dist/img/architect.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box" id="app">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h2"><b>เพิ่ม Admin</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Smart Report Land</p>

                <form @submit.prevent="submitForm">
                    <label for="">ชื่อ-สกุล Admin</label>
                    <div class="input-group mb-3">
                        <input type="text" v-model.trim="payload.a_full_name" required class="form-control"
                            placeholder="ชื่อ-สกุล Admin">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">ชื่อผู้ใช้งาน Admin</label>
                    <div class="input-group mb-3">
                        <input type="text" v-model.trim="payload.a_username" required class="form-control"
                            placeholder="ชื่อผู้ใช้งาน Username Admin">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">รหัสผ่าน Admin</label>
                    <div class="input-group mb-3">
                        <input type="password" placeholder="รหัสผ่าน Admin" required v-model.trim="payload.a_password"
                            class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">เพิ่ม Admin</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div v-if="createAdminStatus" class="alert alert-danger mt-3" role="alert">
                    {{message}}!
                </div>

                <!-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> -->
                <!-- <p class="mb-0">
                    <a href="register.html" class="text-center"></a>
                </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <script>
    const {
        createApp
    } = Vue

    createApp({
        mounted() {
            // this.getOwnerLandById(1)
        },
        data() {
            return {
                message: '',
                payload: {
                    a_full_name: "",
                    a_username: "",
                    a_password: ""
                },
                createAdminStatus: false
            }
        },
        methods: {
            async createAdmin() {
                try {
                    const {
                        data
                    } = await axios.post(`../api/add_admin.php`, this.payload)
                    // console.log('data', data);
                    if (data && data.status == 200) {

                        this.createAdminStatus = false
                        this.message = ''

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เพิ่ม Admin สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => location = '../index.php');

                    } else {
                        this.message = 'ไม่สามารถเพิ่ม Admin ได้'
                        this.createAdminStatus = true
                        Swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถเพิ่ม Admin ได้',
                            text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                        })

                    }

                } catch (error) {
                    console.error(error);
                    this.message = 'ไม่สามารถเพิ่ม Admin ได้'
                    this.createAdminStatus = true
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถเพิ่ม Admin ได้',
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    })
                }
            },
            async submitForm() {
                try {

                    // console.log('payload', this.payload);
                    this.createAdmin();

                } catch (error) {
                    console.error(error);

                }
            }
        }
    }).mount('#app')
    </script>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>
<?php 
}else{
  header("location:login.php");  
}
?>