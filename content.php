<?php
  require_once("config.php");
?>
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h4>
        Phiếu nhập sách
      </h4>

      <p>
      <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM phieunhap")){
            $rows = mysqli_num_rows($run);

            echo $rows." phiếu";
          }
          
        ?>
          
        </p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="index.php?controller=phieunhapsach" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h4>
        Hoá đơn bán sách
      </h4>

      <p>
       <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM phieuhoadon")){
            $rows = mysqli_num_rows($run);

            echo $rows." hoá đơn";
          }
          
        ?></p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="index.php?controller=phieuhoadon" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h4>
        Quản lý sách
       
      </h4>

      <p>
         <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM sach")){
            $rows = mysqli_num_rows($run);

            echo $rows." quyển";
          }
          
        ?>
      </p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="index.php?controller=danhsachsach" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h4>
          
         Phiếu thu tiền

      </h4>

      <p>
       <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM phieuthutien")){
            $rows = mysqli_num_rows($run);

            echo $rows." phiếu";
          }
          
        ?>
          
        </p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="index.php?controller=phieuthutien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-dark">
    <div class="inner">
      <h4> 
       
        Khách hàng    
      </h4>

      <p>
       <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM khachhang")){
            $rows = mysqli_num_rows($run);

            echo $rows." khách";
          }
          
        ?></p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="index.php?controller=khachhang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-light">
    <div class="inner">
      <h4>
        Báo cáo tồn
      </h4>

      <p>
         <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM baocaoton")){
            $rows = mysqli_num_rows($run);

            echo "Báo cáo tồn: ".$rows."<br>";
          }
          
        ?>
      </p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="index.php?controller=baocaoton" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h4>
        Báo cáo công nợ
      </h4>

      <p>
        <?php
          
          if($run = mysqli_query($conn,"SELECT * FROM baocaocongno")){
            $rows = mysqli_num_rows($run);

            echo "Báo cáo công nợ: ".$rows;
          }
          
        ?>
      </p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="index.php?controller=baocaocongno" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-secondary">  
    <div class="inner">
      <h4>Thay đổi quy định</h4>

      <p>5 quy định</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="index.php?controller=thaydoiquydinh" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h4>Thông tin thành viên nhóm 7</h4>

      <p>3 thành viên</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="index.php?controller=infogroup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
