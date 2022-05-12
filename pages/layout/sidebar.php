<?php

 @session_start();
  
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../pages/update_owner_land.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <!-- <a href="#" class="nav-link text-danger">องค์การบริหารส่วนตำบลท่าจำปา</a> -->
            <a href="#" class="nav-link text-danger"><?=$_SESSION["m_name"];?></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Smart Report Land</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$_SESSION["a_full_name"]?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            ที่ดิน
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pages/floor_plan.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผังบริเวณ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/floor_plan_pt1.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายงาน ผท. 1</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>เพิ่มราคาประเมินที่ดิน</p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 1(Parcel)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 123 รวม (LTax)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 123 รวม (Parcel)</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            สิ่งปลูกสร้าง
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pages/building_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการสิ่งปลูกสร้าง</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            ป้าย
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pages/update_owner_land.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>การเปลี่ยนเจ้าของป้าย</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผังบริเวณ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 1(LTax)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 1(Parcel)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 123 รวม (LTax)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ผท. 123 รวม (Parcel)</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../pages/tax_item_list.php" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            รายการการใช้ประโยชน์
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pages/connect_mis_gis.php" class="nav-link">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            ข้อมูลเชื่อม Mis กับ Gis
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-header">บัญชีผู้ใช้</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            ตั้งค่าบัญชี
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./update_admin.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>เเก้ไขข้อมูล Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="update_password_admin.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ลืมรหัสผ่าน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./create_admin.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>เพิ่ม Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./login.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            ออกจากระบบ
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>