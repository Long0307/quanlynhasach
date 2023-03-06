
<?php
if(isset($_SESSION)) 
{   
  ob_start();
  session_start(); 
}
header('Content-Type: text/html; charset=UTF-8;multipart/form-data');
require_once "config.php";
require_once "xuly.php";
if(empty($_SESSION["infomember"])){
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QUẢN LÝ NHÀ SÁCH</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="fonts/SourceSansPro.woff2" rel="stylesheet">

  <script src="js/jquery.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <li class="nav-item" style="list-style-type: none;">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color:black;"><i class="fas fa-bars"></i></a>
      </li>
      <!-- Left navbar links -->
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a href="xuly.php?controller=logout" class="btn btn-primary">logout</a>
        </li>
      </ul>
    </nav>
    <!-- navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">ĐỒ ÁN NHÓM 7</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="images/<?php if(isset($_SESSION["infomember"])) echo $_SESSION["infomember"][1]; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php if(isset($_SESSION["infomember"])) echo $_SESSION["infomember"][0]; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <ul class="nav nav-treeview" style="display:block;">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>TRANG CHỦ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?controller=phieunhapsach" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Phiếu nhập sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?controller=hoadon" class="nav-link">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>Hoá đơn bán sách</p>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-tasks nav-icon"></i>
                  <p>Quản lý sách</p>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item text-dark" href="index.php?controller=dausach">Đầu sách</a>
                  <a class="dropdown-item text-dark" href="index.php?controller=tacgia">Tác giả</a>
                  <a class="dropdown-item text-dark" href="index.php?controller=theloaisach">Thể loại sách</a>
                  <a class="dropdown-item text-dark" href="index.php?controller=tracuusach">Tra cứu sách</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="index.php?controller=phieuthutien" class="nav-link">
                  <i class="fas fa-money-bill-wave nav-icon"></i>
                  <p>Phiếu thu tiền</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?controller=khachhang" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-list-ol nav-icon"></i>
                  <p>Báo cáo tháng</p>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item text-dark" href="index.php?controller=baocaoton">Báo cáo tồn</a>
                  <a class="dropdown-item text-dark" href="index.php?controller=baocaocongno">Báo cáo công nợ</a>        
                </div>
              </li>
              <li class="nav-item">
                <a href="index.php?controller=thaydoiquydinh" class="nav-link">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Thay đổi quy định</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="index.php?controller=infogroup" class="nav-link">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Thông tin nhóm 7</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- sidebar-menu -->
        </div>
        <!-- sidebar -->
      </aside>

      <div class="content-wrapper">
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <?php
            $controller = "";
            if(!empty($_GET['controller'])){

              $controller = $_GET['controller'];

              if($controller == "phieunhapsach"){

                echo "<h2>PHIẾU NHẬP SÁCH</h2>";

              }else if($controller == "hoadon"){

                echo "<h2>HOÁ ĐƠN BÁN SÁCH</h2>";

              }else if($controller == "tracuusach"){

                echo "<h2>TRA CỨU SÁCH</h2>";

              }else if($controller == "phieuthutien"){

                echo "<h2>PHIẾU THU TIỀN</h2>";

              }else if($controller == "baocaoton"){

                echo "<h2>BÁO CÁO TỒN</h2>";

              }else if($controller == "baocaocongno"){

                echo "<h2>BÁO CÁO CÔNG NỢ</h2>";

              }else if($controller == "dausach"){

                echo "<h2>ĐẦU SÁCH</h2>";

              }else if($controller == "infogroup"){

                echo "<h2>THÔNG TIN NHÓM 7</h2>";

              }else if($controller == "tacgia"){

                echo "<h2>TÁC GIẢ</h2>";

              }else if($controller == "theloaisach"){

                echo "<h2>THỂ LOẠI SÁCH</h2>";

              }else if($controller == "theloaisach"){

                echo "<h2>KHÁCH HÀNG</h2>";

              }else if($controller == "thaydoiquydinh"){

                echo "<h2>THAY ĐỔI QUY ĐỊNH</h2>";

              }
            }else{
              echo "<h2>TRANG CHỦ</h2>";
            }
            ?>
          </div><!-- row -->
        </div><!-- container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <?php
            require_once("content/header.php");
            ?>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Sản phẩm do <a href="http://adminlte.io">Nhóm 7 TH23.13</a>.</strong>
      tạo ra
      <div class="float-right d-none d-sm-inline-block">
        <b>Ở đây chúng tôi không </b> đùa
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script src="js/select2.min.js" defer></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->
    <script src="js/sweetalert2.all.min.js"></script>
</body>
</html>
