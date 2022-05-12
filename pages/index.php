<?php 
session_start();
if(isset($_SESSION["id"])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ผังบริเวณ</title>
    <link rel="icon" type="image/x-icon" href="../dist/img/architect.png">
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
        <div class="content-wrapper text-center text-white" style="background-image: url('../dist/img/pexels-luis-del-río-15286.jpg'); background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center; opacity: 0.5; linear-gradient(black, black);">
            <div class="cover-container d-flex h-100 p-3 mx-auto flex-column ">
                <main role="main" class="inner cover">
                    <h1 class="cover-heading" style="margin-top: 9rem;"><?=$_SESSION["m_name"];?></h1>
                    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download,
                        edit the text, and add your own fullscreen background photo to make it your own.</p>
                    <p class="lead">
                        <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
                    </p>
                </main>

                <footer class="mastfoot mt-auto">
                    <div class="inner">
                        <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a
                                href="https://twitter.com/mdo">@mdo</a>.</p>
                    </div>
                </footer>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php include_once "../pages/layout/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->




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
                payload: {
                    searchText: ''
                }
            }
        },
        methods: {
            async submitForm() {
                const {
                    searchText
                } = this.payload
                // console.log('searchText', searchText);
                // window.location.href =   `http://localhost:88/smart_lt4/ptx_print.php?no_date=1&s=${searchText}`;
                window.open(`http://localhost:88/smart_lt4/ptx_print.php?no_date=1&s=${searchText}`,
                    '_blank');
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
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "print"]
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