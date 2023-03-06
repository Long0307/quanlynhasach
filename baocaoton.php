
<form action="inbaocaoton.php" method="get" accept-charset="utf-8" class="m-3">
  Chọn thời gian: <input type="month" name="month" id="month">

  <button type="submit" class="btn btn-success m-3">In báo cáo tồn</button>
</form>

<script type="text/javascript">

  $("#month").change(function(event) {
    date = $(this).val();

    $("#tbody-detail").children().remove();

    $.post("ajax/getPeopleTon.php",{ 'date':date },function(data){
      if(data){

        $( "#tbody-detail" ).append(data);

      }
    })
  });

</script>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Sách</th>
      <th scope="col">Tháng</th>
      <th scope="col">Tồn đầu</th>
      <th scope="col">Phát sinh nhập</th>
      <th scope="col">Phát sinh xuất</th>
      <th scope="col">Tồn cuối</th>
    </tr>
  </thead>
  <tbody>
    <tbody id="tbody-detail">
      <?php
      $sqlbaocaoton = "SELECT * FROM baocaoton

      INNER JOIN sach ON baocaoton.masach = sach.masach ORDER BY baocaoton.thang DESC";

      $runbaocaoton = mysqli_query($conn,$sqlbaocaoton);

      $i = 0;

      while ($rowbaocaoton = mysqli_fetch_array($runbaocaoton)) {
        $i++;
        ?>
        <tr>
          <th scope="row">
            <?php echo $i; ?>
          </th>
          <td>  
            <?php echo $rowbaocaoton['tensach']; ?>
          </td>
          <td>  
            <?php echo $rowbaocaoton['thang']; ?>
          </td>
           <td>  
            <?php echo $rowbaocaoton['tondau']; ?> quyển
          </td>
          <td>  
            <?php echo $rowbaocaoton['phatsinhnhap']; ?> quyển
          </td>
          <td>  
            <?php echo $rowbaocaoton['phatsinhxuat']; ?> quyển
          </td>
          <td>  
            <?php echo $rowbaocaoton['toncuoi']; ?> quyển
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </tbody>
</table>
</div>