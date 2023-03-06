              
<style type="text/css">
  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100vh; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }
  
  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
     display: block;
     float: none;
   }
   .cancelbtn {
     width: 100%;
   }
 }
</style> 
<button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-success"><i class="fas fa-plus"></i>  Thêm phiếu thu</button>

<div id="id01" class="modal">

  <form class="modal-content animate col-md-6" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2>Thêm phiếu thu</h2>
    </div>

    <div class="container">

      <label for="uname"><b>Khách hàng</b></label>

      <select class="col-md-6 js-example-basic-single" style="width: 100%;" onchange="checkCus();" id="option-cus" name="state">
        <option value="0" selected><----Chọn----></option>
        <?php
        $i = 0;
        foreach (selectAll("khachhang","makhachhang",$conn) as $value) {
          $i++;
          ?>
          <option value="<?php echo $value['makhachhang']; ?>">Mã khách hàng:<?php echo $value['makhachhang']; ?> | Họ và tên: <?php echo $value['hotenkhachhang']; ?> | Số điện thoại: 0<?php echo $value['sodienthoai']; ?> | Đại chỉ: <?php echo $value['diachi']; ?> | Email: <?php echo $value['email']; ?></option>
          <?php

        }
        ?>
      </select>
      <p id="messenger"></p>
      <label for="uname"><b>Giá trị phiếu thu</b></label>
      <input type="number" name="money" style="width: 100%;" id="money" required>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
      <button type="button" class="btn btn-success col-md-2 float-md-right" id="add" style="display: none;">Thêm</button>
      <button type="button" class="btn btn-success col-md-2 float-md-right" id="pay" style="display: none;">Trả nợ</button>
    </div>
  </form>
</div>

<script>

  $("#add").click(function(event) {

    makhachhang = $("#option-cus").val();

    money = $("#money").val();

     $.post("ajax/writeNote.php",{ 'makhachhang':makhachhang, 'money':money },function(data){

        Swal.fire({
          icon: 'success',
          title: data,
          showConfirmButton: false,
          timer: 1500
        })

        window.location.href = window.location.href;

     })

  });

  $("#pay").click(function(event) {

    makhachhang = $("#option-cus").val();

    money = $("#money").val();

    $.post("ajax/payMoney.php",{ 'makhachhang':makhachhang, 'money':money },function(data){

      item = data.split(" | ");

      if(item[1] == "false"){

        Swal.fire({
          text: item[0],
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Có trả'
        }).then((result) => {
          if (result.isConfirmed) {
           Swal.fire({
            title: "Hãy trả nợ",
            showConfirmButton: false,
            timer: 1500
          })
         }
       })

      }

      if(item[1] == "true"){

        Swal.fire({
          icon: 'success',
          title: item[0],
          showConfirmButton: false,
          timer: 1500
        })

        window.location.href = window.location.href;

      }

    });

  });



  

  function checkCus(){
    makhachhang = $("#option-cus").val();

    $.post("ajax/checkCus.php",{ 'makhachhang':makhachhang },function(data){

      if(data){

        item = data.split(" | ");

        if(item[2] == undefined){

          $("#pay").css("display","none");
          
          $("#messenger").text(data);

          $("#add").css("display","block");

        }else{

          $("#add").css("display","none");

          $("#messenger").text(data);

          $("#pay").css("display","block");

        }

      }

    });
  }

  $(document).ready(function() {
    $('#option-cus').select2();
  });
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
          </script>


          <table class="table table-bordered mt-3 table-hover">
            <thead>
              <tr>
                <th colspan="6" class="text-center display-4">Danh Sách phiếu thu</th>
              </tr>
              <tr>
                <th scope="col">Mã phiếu thu</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Mã khách hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tổng cộng</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <tbody>
                <?php
                $i = 0;

                foreach (selectJoin2('phieuthutien','khachhang','makhachhang',"maphieuthu",$conn) as $value) {
                  $i++;
                  ?>
                  <tr>
                    <th scope="row"><?php echo $value['maphieuthu']; ?></th>
                    <td>  
                     <?php echo $value['ngaythutien']; ?>
                   </td>
                   <td>  
                    <?php echo $value['makhachhang']; ?>
                  </td>
                  <td>  
                   <?php echo $value['hotenkhachhang']; ?>
                 </td>
                 <td>  
                  <?php echo $value['sotienthu']; ?>
                </td>
                <td>  
                  <a href="index.php?controller=phieuthutien&maphieuthu=<?php echo $value['maphieuthu']; ?>" class="btn btn-danger" style="width:auto;">Xoá</a>
                </td>

              </tr>
              <?php

            }
            ?>
          </tbody>

        </tbody>
      </table>

