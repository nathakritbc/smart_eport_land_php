<?php 
session_start();
if(isset($_SESSION["id"])){
     ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>การเปลี่ยนเจ้าของป้าย</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <?php include_once "../pages/layout/sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>การเปลี่ยนเจ้าของป้าย</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Owner Id</th>
                                                <th>ชื่อเจ้าของป้าย</th>
                                                <th>ข้อความภายในป้าย</th>
                                                <th>รหัสป้าย</th>
                                                <th>เปลี่ยนเจ้าของ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once "../configs/connect_db.php";
$sql = "SELECT id,owner_id,annual,s_code,s_name,prefix,fname,lname FROM signboard s JOIN owner o USING(owner_id);";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?=$row["id"]?></td>
                                                <td><?=$row["owner_id"]?></td>
                                                <td><?=$row["prefix"]?><?=$row["fname"]?><?=$row["lname"]?></td>
                                                <td><?=$row["s_name"]?></td>
                                                <td><?=$row["s_code"]?></td>
                                                <td>
                                                    <a type="button" class="btn btn-primary"
                                                        href="http://127.0.0.1:85/property/sign/<?=$row["id"]?>"
                                                        target="_back">ตรวจสอบข้อมูล
                                                    </a>
                                                    <button type="button" class="btn btn-warning ml-2"
                                                        data-toggle="modal" data-target="#editOwnerLand"
                                                        @click="getOwnerLandById('<?=$row["id"]?>')">โอน
                                                    </button>
                                                    <button type="button" class="btn btn-success ml-2"
                                                        data-toggle="modal" data-target="#reportOwnerLand"
                                                        @click="getNameOwnerLand('<?=$row["fname"]?>')">
                                                        รายงาน
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php  
}
} else {
  echo "<tr>ไม่พบข้อมูล</tr>";
}

                                            ?>

                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once "../pages/layout/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->


        <!-- Modal -->
        <div class="modal fade" id="editOwnerLand" tabindex="-1" aria-labelledby="editOwnerLandLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editOwnerLandLabel">เปลี่ยนเจ้าของ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">รหัส Owner Id เดิม</label>
                                <input type="number" v-model.trim="payload.owner_id" required class="form-control"
                                    id="">
                            </div>
                            <div class="form-group">
                                <label for="">รหัส Owner Id ใหม่</label>
                                <input type="number" v-model.trim="payload.new_owner_id" required class="form-control"
                                    id="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-warning">เเก้ไข</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="reportOwnerLand" tabindex="-1" aria-labelledby="reportOwnerLandLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitFormReport">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reportOwnerLandLabel">รายงาน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">ตัวอักษร</label>
                                <input type="text" v-model.trim="oid" required class="form-control" id="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">พิมพ์</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <!-- ./wrapper -->


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
                message: 'Hello Vue!',
                oid: "",
                payload: {
                    id: 0,
                    owner_id: '',
                    annual: '',
                    s_code: '',
                    s_name: '',
                    new_owner_id: ''
                }
            }
        },
        methods: {

            getNameOwnerLand(param) {
                this.oid = param.trim()
                console.log('param', param);
                console.log('this.oid', this.oid);
            },
            submitFormReport() {
                // window.open(`http://localhost:88/smart_lt4/pp1_print.php?s=${this.oid}`, '_blank');
                window.open(`http://localhost:88/smart_lt4/pp1_print.php?&ud=&oid=${this.oid}`, '_blank');

            },
            async getOwnerLandById(id) {
                try {
                    const {
                        data
                    } = await axios.get(`../api/owner_land.php?id=${id}`)
                    const result = data[0]
                    // console.log('result', result);
                    this.payload = data[0]
                } catch (error) {
                    console.error(error);
                }
            },
            async submitForm() {
                try {

                    const params = {
                        ...this.payload,
                        owner_id: this.payload.new_owner_id
                    }
                    // console.log('params', params);
                    const {
                        data
                    } = await axios.post(`../api/update_signboard.php`, params)
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => location = 'update_owner_land.php')
                } catch (error) {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'เเก้ไขข้อมูลไม่สำเร็จ',
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    })
                }
            }
        }
    }).mount('#app')
    </script>


    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    <!-- Page specific script a -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis", {
                extend: 'csv',
                text: 'Export csv',
                charset: 'utf-8',
                extension: '.csv',
                fieldSeparator: ';',
                fieldBoundary: '',
                filename: 'export',
                bom: true
            }, ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>

<?php 
}else{
  header("location:login.php");  
}
?>