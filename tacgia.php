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
<button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-success"><i class="fas fa-plus"></i>  Thêm tác giả</button>



<div id="id01" class="modal">

  <form class="modal-content animate col-md-6" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2>THÊM TÁC GIẢ</h2>
    </div>

    <div class="container">
      <label for="uname"><b>Tên tác giả</b></label>
      <input type="text" placeholder="Thêm tác giả" name="name" required>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
      <button type="submit" onclick="document.getElementById('id01').style.display='none'" name="addauthor" class="btn btn-success col-md-2">Thêm</button>
    </div>
  </form>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

<?php
if(isset($result)){

  if(isset($result['success'])){

    echo $result['success'];

  }else{

    echo $result['error'];

  }
}

?>
<table class="table table-bordered mt-3 table-hover">
  <thead>
    <tr>
      <th colspan="4" class="text-center display-4">Danh sách tác giả</th>
    </tr>
    <tr>
      <th scope="col">Mã tác giả</th>
      <th scope="col">Tên tác giả</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    <tbody>
      <?php
      $i = 0;
        foreach (selectAll("tacgia","id",$conn) as $value) {
          $i++;
          ?>
          <tr>
            <th scope="row"><?php echo $value['id']; ?></th>
            <td>  
              <?php echo $value['tentacgia']; ?>
            </td>
            <td>  
              <a href="index.php?controller=tacgia&action=delete&id=<?php echo $value['id']; ?>" class="btn btn-danger">Xoá</a>
            </td>

          </tr>
          <?php
         
        }
      ?>

    </tbody>

  </tbody>
</table>
