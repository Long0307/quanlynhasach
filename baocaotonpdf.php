
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
  <tbody id="tbody-detail">
    <?php

    require_once("config.php");
    // if(isset($_GET['month'])){

    //   echo $month = $_GET['month'];

    //   // $monthReal = explode("-", $month);

    //   // $monthquery = $monthReal[1];

      $getMonthDB = "SELECT * FROM baocaoton INNER JOIN sach ON baocaoton.masach = sach.masach WHERE thang = 3";

      $rungetMonthDB = mysqli_query($conn,$getMonthDB);

      $i = 0;

      while ($rowgetMonthDB = mysqli_fetch_array($rungetMonthDB)) {

          $i++;
        
        ?>  

        <tr>
          <th scope="row">
            <?php echo $i; ?>
          </th>
          <td>  
            <?php echo $rowgetMonthDB['tensach']; ?>
          </td>
          <td>  
            <?php echo $rowgetMonthDB['thang']; ?>
          </td>
          <td>  
            <?php echo $rowgetMonthDB['tondau']; ?> quyển
          </td>
          <td>  
            <?php echo $rowgetMonthDB['phatsinhnhap']; ?> quyển
          </td>
          <td>  
            <?php echo $rowgetMonthDB['phatsinhxuat']; ?> quyển
          </td>
          <td>  
            <?php echo $rowgetMonthDB['toncuoi']; ?> quyển
          </td>
        </tr> 
        <?php
      }
      ?>
      <?php

    // }

  ?>
</tbody>
</table>
