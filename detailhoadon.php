  <?php
  if(isset($_GET['maphieuhoadon'])){

    $arr = selectJoin3NewDetails('phieuhoadon','maphieuhoadon','makhachhang','chitietphieuhoadon','khachhang',$conn, $_GET['maphieuhoadon']);

  }
  ?>

  <from class="modal-content animate col-md-12" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <h2>Chi tiết hoá đơn</h2>
    </div>
    <div class="container col-md-12">
      <table class="table m-3" style="width: 25%;float: left;" id="detail-cus">

        <thead>
          <tr>
            <th scope="col"><b>Mã khách hàng:</b><span style="margin-left: 20px;"><?php echo $arr[0]['makhachhang']; ?></span></th>
          </tr>
          <tr>
            <th scope="col"><b>Tên khách hàng:</b><span style="margin-left: 20px;"><?php echo $arr[0]['hotenkhachhang']; ?></span></th>
          </tr>
          <tr>
            <th scope="col"><b>Số điện thoại:</b><span style="margin-left: 20px;">0<?php echo $arr[0]['sodienthoai']; ?></span></th>
          </tr>
          <tr>
            <th scope="col"><b>Email:</b><span style="margin-left: 20px;"><?php echo $arr[0]['email']; ?></span></th>
          </tr>
          <tr>
            <th scope="col"><b>Địa chỉ:</b><span style="margin-left: 20px;"><?php echo $arr[0]['diachi']; ?></span></th>
          </tr>
          <tr>
            <th scope="col"><b>Tổng nợ:</b><span style="margin-left: 20px;"><?php echo number_format($arr[0]['sotienno'], 0, '', ',')." VNĐ"; ?></span></th>
          </tr>
        </thead>

      </table>

      <h5 class="col-md-12" style="float: left;">Chi tiết hoá đơn</h5>
      <table class="table table-striped col-md-12">

        <thead>
          <tr>
            <th scope="col">Mã hoá đơn</th>
            <th scope="col">Mã khách hàng</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Mã sách</th>
            <th scope="col">Số lượng bán</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php
          $i = 0;
          foreach (selectJoin3NewDetails('phieuhoadon','maphieuhoadon','makhachhang','chitietphieuhoadon','khachhang',$conn,$_GET['maphieuhoadon']) as $value) {
            $i++;
            ?>
            <tr id="rowBook-4">
              <td id="idsach-4">  
                <?php echo $value['maphieuhoadon']; ?>
              </td>
              <td id="tensach-4">  
                <?php echo $value['makhachhang']; ?>
              </td>
              <td id="nhaxb-4">  
                <?php echo $value['hotenkhachhang']; ?>
              </td>
              <td id="namxb-4"> 
                <?php echo $value['masach']; ?>
              </td>
              <td id="namxb-4"> 
                <?php echo $value['soluongban']; ?>
              </td>
              <td>
                  <?php echo number_format($value['tongtiennhap']/$value['soluongban'], 0, '', ',')." VNĐ"; ?>
              </td>
              <td id="giaban-4">  
                <?php echo number_format($value['tongtiennhap'], 0, '', ',')." VNĐ"; ?>
              </td>
              <td id="tongtien-4">  
                <?php echo $value['ngaylaphoadon']; ?>
              </td>
             
             
              <td></td>
              <td>  
                <i class="fas fa-minus-circle" onclick="deleteBook(4)" id="delete-row-4" style="color:red;"></i>
              </td>
            </tr>
            <?php

          }
          ?>
        </tbody>
      </table>

      <table class="table" style="width: 25%;float: right;">
        <thead>
          <tr>
            <th scope="col"><b>Tổng cộng:</b><span id="total-final" style="margin-left: 20px;"><?php echo number_format($arr[0]['tongcong'], 0, '', ',')." VNĐ"; ?></span></th>
          </tr>
          <tr>
            <th scope="col"><b>Số tiền trả:</b><?php echo number_format($arr[0]['sotientra'], 0, '', ',')." VNĐ"; ?></th>
          </tr>
          <tr>
            <th scope="col"><b>Nợ:</b><span id="debt" style="width:100px;margin-left: 45px;"><?php echo number_format($arr[0][4], 0, '', ',')." VNĐ"; ?></span></th>
          </tr> 
        </thead>
      </table>
    </div>
  </from>