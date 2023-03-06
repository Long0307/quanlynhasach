              
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

<button type="button" class="col-md-2 btn btn-info mb-3" onclick="myFunction()">Tra cứu sách</button>

<div class="input-group col-md-4 mb-3 none_1">
 <input type="text" class="form-control" placeholder="Tìm kiếm sách" name="keyword" id="searchBook" aria-label="Recipient's username" aria-describedby="button-addon2">
 <div class="input-group-append">
   <button class="btn btn-outline-secondary" type="button" id="search"><i class="fas fa-search"></i></button>  
 </div>
</div>

<style type="text/css">
  .none_1{
    display: none;

  }
  .mystyle{
    display: block;
    display: flex;
  }
</style>


<script>

  $("#search").click(function(event) {

    $("#tbody-detail").children().remove();

    var keyword = $("#searchBook").val();

    $.post("ajax/searchBook.php",{ 'keyword':keyword },function(data){

      if(data){

        $( "#tbody-detail" ).append(data);

      }
    });
  });

  function myFunction() {

    var element = document.getElementsByClassName("none_1")[0];

    element.classList.toggle("mystyle");
  }
</script>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Sách</th>
      <th scope="col">Thể loại</th>
      <th scope="col">Tác giả</th>
      <th scope="col">Nhà xuất bản</th>
      <th scope="col">Năm xuất bản</th>
      <th scope="col">Số lượng tồn</th>
      <th scope="col">Gía tiền nhập (VNĐ)</th>
    </tr>
  </thead>
  <tbody>
    <tbody id="tbody-detail">
     <?php
     $i = 0;
     foreach (selectJoin3("sach","theloai","tacgia","masach",$conn) as $value) {
      $i++;
      ?>
      <tr>
        <th scope="row"><?php echo $value['masach']; ?></th>
        <td>  
          <?php echo $value['tensach']; ?>
        </td>
        <td>  
          <?php echo $value['tentheloai']; ?>
        </td>
        <td>  
          <?php echo $value['tentacgia']; ?>
        </td>
        <td>  
          <?php echo $value['nhaxuatban']; ?>
        </td>
        <td>  
          <?php echo $value['namxuatban']; ?>
        </td>
        <td>  
          <?php echo $value['soluongton']; ?>
        </td>
        <td>  
          <?php echo number_format($value['dongia'], 0, '', ',')." VNĐ"; ?>
        </td>
      </tr>
      <?php

    }
    ?>
  </tbody>

</tbody>
</table>


<script>

  // document.getElementById('id02').style.display='none'



  var modal = document.getElementById('id02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>