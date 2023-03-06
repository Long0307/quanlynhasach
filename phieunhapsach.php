    
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
    margin: 5% auto 15% 5.7%;
    border: 1px solid #888;
    width: 94%;
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
<button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-success"><i class="fas fa-plus"></i>  Thêm phiếu nhập sách</button>

<div id="id01" class="modal">

  <from class="modal-content animate col-md-12" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2>Thêm phiếu nhập sách</h2>
    </div>

    <div class="container col-md-12">
      <br>
      <p>Thêm phiếu thành công</p>
      <div class="row">
        <h5 class="col-md-9">Chi tiết hoá đơn</h5>
        <h5 class="col-md-3">Tổng cộng: 0đ</h5>
      </div>
      <table class="table table-striped col-md-12">
        <thead>
          <tr>
              <th scope="col">Mã sách</th>
              <th scope="col">Tên sách</th>
              <th scope="col">Thể loại</th>
              <th scope="col">Tác giả</th>
              <th scope="col">Nhà xuất bản</th>
              <th scope="col">Năm xuất bản</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Giá nhập</th>
              <th scope="col">Tổng tiền</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="tbody">
         <tr id="rowBook-4">
          <input type="hidden" name="masach" id="masach-4" value="0" style="width: 50px;">
          <input type="hidden" name="dongia" id="dongia-4" value="0" style="width: 50px;">
          <td id="idsach-4">  

          </td>
          <td id="tensach-4">  

            <button type="button" style="width: 150px;" id="chonsach-4" onclick="ham(4)" class="btn btn-success">Chọn sách</button>
          </td>
          <td id="theloai-4">  

          </td>
          <td id="tacgia-4">  

          </td>
          <td id="nhaxb-4">  

          </td>
          <td id="namxb-4">  

          </td>
          <td>  
            <input type="number" placeholder="" value="0" id="soluong-4" style="width:80px;" name="soluong" onchange="total(4)" required>
          </td>
          <td id="gianhap-4">  

          </td>
          <td id="tongtien-4">  

          </td>
          <td>  
            <i class="fas fa-minus-circle" onclick="deleteBook(4)" id="delete-row-4" style="color:red;"></i>
          </td>
        </tr>
      </tbody>
    </table>
    <button type="button" style="width: 150px;" id="addBook" class="btn btn-success"><i class="fas fa-plus"></i>   Thêm sách    (<span id="click">9</span>)</button>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger col-md-2">Thoát</button>
    <button type="button" onclick="create();" style="display: none;" class="btn btn-success col-md-2 create">Tạo</button>
  </div>
</form>
</div>
<div id="id4" class="modal">

  <form class="modal-content animate col-md-6" action="/action_page.php" method="post" style="margin:0 auto auto auto;">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id4').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2>CHỌN SÁCH</h2>
    </div>

    <div class="container booksach">

      <label for="uname"><b>Đầu sách</b></label>

      <label for="uname"><b>Mã sách</b></label>
      <select class="js-example-basic-single form-control" style="width: 100%;" name="option-cus-4" id="option-cus-4" required>

       <option value="0">---Chọn---</option>
       <?php
       foreach (selectAll("sach","masach",$conn) as $value) {
        ?>
        <option value="<?php echo $value['masach']; ?>">Mã sách: <?php echo $value['masach']; ?>, Tên sách: <?php echo $value['tensach']; ?> </option>
        <?php
      }
      ?>
    </select>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id4').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
    <button type="button" id="confirmBook_4" onclick="selectBook(4);" class="btn btn-success col-md-2" name="addTable">Thêm</button>
  </div>
</form>

</div>
<script>

  function ham(id){
    document.getElementById('id'+id).style.display='block';
  }

  var ktrasach = [];

  function selectBook(id){
    masach = $('select#option-cus-'+id).val();

    if(ktrasach.includes(masach) == true){

      Swal.fire({
        title: 'Bạn đã chọn sách này bạn không được chọn lại',
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
      })

    }else{

      $.post("ajax/addBook.php",{ 'masach':masach },function(data){

        item = data.split("+");

        $("#masach-"+id).val(item[0]);
        $("#dongia-"+id).val(item[6]);

        $("#idsach-"+id).text(item[0]);
        $("#tensach-"+id).text(item[1]);
        $("#theloai-"+id).text(item[2]);
        $("#tacgia-"+id).text(item[3]);
        $("#nhaxb-"+id).text(item[4]);
        $("#namxb-"+id).text(item[5]);
        $("#gianhap-"+id).text(item[7]);

      });
      ktrasach.push(masach);
      document.getElementById('id'+id).style.display='none';
    }

    
  }

  function total(id){

    soluong = $('#soluong-'+id).val();

    masach = $('#masach-'+id).val();

    dongia = $('#dongia-'+id).val();


    $.post("ajax/soluongvatongnhapsach.php",{ 'masach':masach,'soluong':soluong,'dongia':dongia },function(data){

      $("#tongtien-"+id).text(data);

      $(".create").css("display","block");

    });

  }


  function create(){
    $.post("ajax/createphieunhap.php",function(data){

      if(data){

        Swal.fire({
          icon: 'success',
          title: 'Thêm thành công',
          showConfirmButton: false,
          footer: '<a href="index.php?controller=phieunhapsach">Thoát</a>'
        })

      }

    });
  } 



  var none = "none";
  var $solanClick = Number($("#click").text());
  var click = 9;
  var Ochonsach = 4; 

  $("#addBook").click(function(event) {
    if($solanClick > 0){

      click--;
      Ochonsach++;
      $solanClick = click;

      $("#click").text($solanClick);

      $( "#tbody" )
      .append( 
        "<tr id='rowBook-"+Ochonsach+"'>"+"<input type='hidden' name='masach' id='masach-"+Ochonsach+"' value='0' style='width: 50px;'>"
        +"<input type='hidden' name='dongia' id='dongia-"+Ochonsach+"' value='0' style='width: 50px;'>"
        +"<td id='idsach-"+Ochonsach+"'>"+"</td>"
        +"<td id='tensach-"+Ochonsach+"'>"+  
        "<button type='button' style='width: 150px;' id='chonsach-"+Ochonsach+"' onclick='ham("+Ochonsach+")' class='btn btn-success'>Chọn sách</button>"
        +"</td>"
        +"<td id='theloai-"+Ochonsach+"'>"+"</td>"
        +"<td id='tacgia-"+Ochonsach+"'>"+"</td>"
        +"<td id='nhaxb-"+Ochonsach+"'>"+"</td>"
        +"<td id='namxb-"+Ochonsach+"'>"+"</td>"
        +"<td>"  
        +"<input type='number' placeholder='' value='0' id='soluong-"+Ochonsach+"' onchange='total("+Ochonsach+")'' style='width:80px;' name='soluong' onchange='' required>"
        +"</td>"
        +"<td id='gianhap-"+Ochonsach+"'>"+"</td>"
        +"<td id='tongtien-"+Ochonsach+"'>"+"</td>"
        +"<td>"   
        +"<i class='fas fa-minus-circle' onclick='deleteBook("+Ochonsach+")' id='delete-row-"+Ochonsach+"' style='color:red;'></i>"
        +"</td>"
        +"</tr>" );

    }
  });

  function deleteBook(id){

    masach = $('#masach-'+id).val();
    for( var i = 0; i < ktrasach.length; i++){ 
     if ( ktrasach[i] == masach) {
       ktrasach.splice(i, 1); 
     }
     console.log(ktrasach[i]);
   }

   console.log(ktrasach);
   x = document.getElementById("delete-row-"+id);

   $.post("ajax/deleteBookPhieuNhapSach.php",{ 'masach':masach },function(data){

    if(data){
      $("#rowBook-"+id).css('display', 'none');
    }

  });

 }


  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<table class="table table-bordered" id="danhsachphieu">
  <thead>
    <tr>
      <th scope="col">Mã phiếu sách</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Tổng cộng</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    <tbody>
     <?php
     foreach (selectAll("phieunhap","maphieunhap",$conn) as $value) {
      ?>
      <tr>
        <th scope="row"><?php echo $value['maphieunhap']; ?></th>
        <td>  
          <?php echo $value['ngaynhap']; ?>
        </td>
        <td>  
         <?php echo number_format($value['tongtiennhap'], 0, '', ',')." VNĐ"; ?>
       </td>
       <td>  
        <div class="btn btn-primary" type="button" onclick="infoPhieu(<?php echo $value['maphieunhap']; ?>);" style="width:auto;">Thông tin</div>|
        <button type="button" class="btn btn-danger col-md-2" onclick="xoaPhieu(<?php echo $value['maphieunhap']; ?>);">Xoá</button>
      </td>
    </tr>
    <?php
  }
  ?>
</tbody>

</tbody>
</table>
</div>
<script>

  // document.getElementById('id02').style.display='block'

  function xoaPhieu(maphieunhap){

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
       $.post("ajax/deletePhieuNhapSach.php",{ 'maphieunhap':maphieunhap },function(data){

        if(data){

          $('#danhsachphieu').load('index.php?controller=phieunhapsach #danhsachphieu');
        }

      });

       swalWithBootstrapButtons.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
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
</script>

<div id="id02" class="modal">

 <from class="modal-content animate col-md-12" action="/action_page.php" method="post">
  <div class="imgcontainer">
    <span onclick="removeItemPre();" class="close" title="Close Modal">&times;</span>
    <h2>Chi tiết phiếu nhập sách</h2>
  </div>

  <div class="container col-md-12">
    <br>
    <table class="table table-striped col-md-12">
      <thead>
        <tr>
          <th scope="col">Mã phiếu nhập</th>
          <th scope="col">Mã sách</th>
          <th scope="col">Tên sách</th>
          <th scope="col">Số lượng nhập</th>
          <th scope="col">Giá nhập</th>
          <th scope="col">Tổng tiền</th>

        </tr>
      </thead>
      <tbody id="tbody-detail">


      </tbody>
    </table>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="removeItemPre();" class="btn btn-danger col-md-2">Thoát</button>
  </div>
</form>

</div>

<script>

  function removeItemPre(){
    $("#tbody-detail").children().remove();
    document.getElementById('id02').style.display='none'; 
  }

  function infoPhieu(maphieunhap){

    $.post("ajax/detailPhieuNhapSach.php",{ 'maphieunhap':maphieunhap },function(data){

    if(data){

      $( "#tbody-detail" ).append(data);

    }
   document.getElementById('id02').style.display='block';
  });
}

  // Get the modal
  var modal = document.getElementById('id02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

<script>

        // Get the modal
        var modal = document.getElementById('id4');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      </script>
      <div id="id03" class="modal">

        <form class="modal-content animate col-md-6" action="/action_page.php" method="post" style="margin:0 auto auto auto;">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>THÊM KHÁCH HÀNG</h2>
          </div>

          <div class="container">

            <label for="uname"><b>Tên khách hàng</b></label>
            <input type="text" class="form-control" placeholder="Thêm Tên khách hàng" name="uname" required>

            <label for="uname"><b>Số điện thoại</b></label>
            <input type="text" class="form-control" placeholder="Thêm Số điện thoại" name="uname" required>

            <label for="uname"><b>Điạ chỉ</b></label>
            <input type="text" class="form-control" placeholder="Thêm Điạ chỉ" name="uname" required>

            <label for="uname"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Thêm Email" name="uname" required>

            <label for="uname"><b>Sinh nhât</b></label>
            <input type="date" class="form-control" placeholder="Thêm sinh nhật" name="uname" required>

          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
            <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-success col-md-2">Thêm</button>
          </div>
        </form>

      </div>
      <script>


        // Get the modal
        var modal = document.getElementById('id03');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      </script>
      <?php

      for($i = 5;$i <= 13;$i++){
        ?>
        <div id="id<?php echo $i; ?>" class="modal">

          <form class="modal-content animate col-md-6" action="" method="post" style="margin:0 auto auto auto;">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h2>CHỌN SÁCH</h2>
            </div>

            <div class="container booksach">

              <label for="uname"><b>Đầu sách</b></label>

              <label for="uname"><b>Mã sách</b></label>
              <select class="js-example-basic-single form-control" style="width: 100%;" name="option-cus-<?php echo $i; ?>" id="option-cus-<?php echo $i; ?>" required>

               <option value="0">---Chọn---</option>
               <?php
               foreach (selectAll("sach","masach",$conn) as $value) {
                ?>
                <option value="<?php echo $value['masach']; ?>">Mã sách: <?php echo $value['masach']; ?>, Tên sách: <?php echo $value['tensach']; ?> </option>
                <?php
              }
              ?>

            </select>

          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
            <button type="button" id="confirmBook_<?php echo $i; ?>" onclick="selectBook(<?php echo $i; ?>);" class="btn btn-success col-md-2" name="addTable">Thêm</button>
          </div>
        </form>

      </div>
      <script>



        // Get the modal
        var modal = document.getElementById('id<?php echo $i; ?>');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      </script>
      <?php
    }
    ?>
    
