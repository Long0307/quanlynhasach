
<form action="inbaocaocongno.php" method="get" accept-charset="utf-8" class="m-3">
  Chọn thời gian: <input type="month" name="month" id="kiemtrathang">

  <button type="submit" class="btn btn-success m-3">In báo cáo tồn</button>
</form>

<script type="text/javascript">
 
  $("#kiemtrathang").change(function(event) {
    date = $(this).val();

    $("#tbody-detail").children().remove();

    $.post("ajax/getPeople.php",{ 'date':date },function(data){
      if(data){

        $( "#tbody-detail" ).append(data);

      }
    })
  });

</script>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Mã khách hàng</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Tháng</th>
      <th scope="col">Nợ đầu</th>
      <th scope="col">Tổng tiền mua</th>
      <th scope="col">Tổng tiền trả</th>
      <th scope="col">Nợ cuối</th>
    </tr>
  </thead>
    <tbody id="tbody-detail">
      <?php
      $sqlnguoiNo = "SELECT * FROM baocaocongno

      INNER JOIN khachhang ON baocaocongno.makhachhang = khachhang.makhachhang ORDER BY baocaocongno.thang DESC";

      $runnguoiNo = mysqli_query($conn,$sqlnguoiNo);

      while ($rownguoiNo = mysqli_fetch_array($runnguoiNo)) {
        ?>

        <tr>
          <th>
            <?php echo $rownguoiNo['makhachhang']; ?>
          </th>
          <th>
            <?php echo $rownguoiNo['hotenkhachhang']; ?>
          </th>
          <td>  
            <?php echo "0".$rownguoiNo['sodienthoai']; ?>
          </td>
           <td>  
            <?php echo $rownguoiNo['thang']; ?>
          </td>
          <td>  
            <?php echo number_format($rownguoiNo['nodau'], 0, '', ',')." VNĐ"; ?>
          </td>
          <td>  
            <?php echo number_format($rownguoiNo['tongtienmua'], 0, '', ',')." VNĐ"; ?>
          </td>
          <td>  
            <?php echo number_format($rownguoiNo['tongtientra'], 0, '', ',')." VNĐ"; ?>
          </td>
          <td>  
            <?php echo number_format($rownguoiNo['nocuoi'], 0, '', ',')." VNĐ"; ?>
          </td>
        </tr>

        <?php
      }
      ?>
  </tbody>
</table>
</div>