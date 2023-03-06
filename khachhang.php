              
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
<button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-success"><i class="fas fa-plus"></i>  Thêm khách hàng</button>

<div id="id01" class="modal">

  <form class="modal-content animate col-md-6" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2>Thêm khách hàng</h2>
    </div>

    <div class="container">

      <label for="uname"><b>Họ và tên khách hàng</b></label>
      <input type="text" name="name" id="name" required>

      <label for="uname"><b>Số điện thoại</b></label>
      <input type="text" name="phone" id="phone" required>

      <label for="uname"><b>Địa chỉ</b></label>
      <input type="text" name="address" id="address" required>

      <label for="uname"><b>Email</b></label>
      <input type="text" name="email" id="email" required>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <a href="index.php?controller=khachhang" class="btn btn-danger col-md-2">Cancel</a>
      <button type="button" onclick="addCustomer();" class="btn btn-success col-md-2">Thêm</button>
    </div>
  </form>
</div>

<script>
  function addCustomer(){

    name = $("#name").val();
    phone = $("#phone").val();
    address = $("#address").val();
    email = $("#email").val();

    $.post("ajax/addCustomer.php",{ 

      'name':name,'phone':phone,'address':address,'email':email

    },function(data){

      // alert(data);

      Swal.fire({
        icon: 'success',
        title: 'Thêm khách hàng thành công',
        showConfirmButton: false,
        timer: 1500
      })

    });

  }
      // Get the modal

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
                <th colspan="7" class="text-center display-4">Danh Sách Khách Hàng</th>
              </tr>
              <tr>
                <th scope="col">Mã khách hang</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Email</th>
                <th scope="col">Tổng nợ</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody id="listCus">
             <?php
             $i = 0;
             foreach (selectAll("khachhang","makhachhang",$conn) as $value) {
              $i++;
              ?>
              <tr>
                <th scope="row"><?php echo $value['makhachhang']; ?></th>
                <td>  
                  <?php echo $value['hotenkhachhang']; ?>
                </td>
                <td>  
                  <?php echo $value['sodienthoai']; ?>
                </td>
                <td>  
                  <?php echo $value['diachi']; ?>
                </td>
                <td>  
                  <?php echo $value['email']; ?>
                </td>
                <td>  
                  <?php echo $value['sotienno']; ?>
                </td>
                <td>  
                  <div class="btn btn-primary" type="button" onclick="showDetailCus(<?php echo $value['makhachhang']; ?>);" style="width:auto;">Chỉnh sửa</div>|
                  <div class="btn btn-danger" onclick="deleteCus(<?php echo $value['makhachhang']; ?>)">Xoá</div>
                </td>

              </tr>
              <?php

            }
            ?>
          </tbody>


        </table>
        <script type="text/javascript">

          function deleteCus(makhachhang){

            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {

              if (result.isConfirmed) {
                $.post("ajax/deleteCus.php",{ 'makhachhang':makhachhang },function(data){

                   swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )

                   window.location.reload();

               }); 

              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                  )
              }

            })

          }

          function showDetailCus(makhachhang){

           $("#detail-cus").children().remove();

           $.post("ajax/showDetailCus.php",{ 

            'makhachhang':makhachhang

          },function(data){

            $( "#detail-cus" ).append(data);

            document.getElementById('id02').style.display='block';
          });

         }
          // document.getElementById('id02').style.display='block'
        </script>
        <div id="id02" class="modal">

          <form class="modal-content animate col-md-6" action="" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h2>SỬA THÔNG TIN KHÁCH HÀNG</h2>
            </div>

            <div class="container" id="detail-cus">


            </div>

            <div class="container" style="background-color:#f1f1f1">
              <a href="index.php?controller=khachhang" class="btn btn-danger col-md-2">Cancel</a>
              <button type="button" onclick="updateCus();" class="btn btn-primary col-md-3">Lưu thay đổi</button>
            </div>
          </form>
        </div>

        <script>

          function updateCus(){

            makhachhang = $("#makhachhang").val();
            name = $("#name-up").val();
            phone = $("#phone-up").val();
            address = $("#address-up").val();
            email = $("#email-up").val();

            $.post("ajax/updateCus.php",{ 

              'makhachhang':makhachhang,'name':name,'phone':phone,'address':address,'email':email

            },function(data){

              Swal.fire({
                icon: 'success',
                title: 'Sửa khách hàng thành công',
                showConfirmButton: false,
                timer: 1500
              })

            });

          }

            // document.getElementById('id02').style.display='none'

            // Get the modal
            var modal = document.getElementById('id02');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
          </script>