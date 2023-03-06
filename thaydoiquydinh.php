<form method="post" action="" class="col-md-8">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Số lượng nhập tối thiểu</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inputEmail3" name="soluongnhaptoithieu" value="<?php echo selectAll("thamso","sudungquydinh4",$conn)[0]['soluongnhaptoithieu']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputnumber3" class="col-sm-6 col-form-label">Số lượng tồn tối thiểu trước khi nhập</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inputnumber3" name="soluongtontoithieutruockhinhap" value="<?php echo selectAll("thamso","sudungquydinh4",$conn)[0]['soluongtontoithieutruockhinhap']; ?>">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputnumber3" class="col-sm-6 col-form-label">Tổng nợ tối đa</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="inputnumber3" name="tongnotoida" value="<?php echo selectAll("thamso","sudungquydinh4",$conn)[0]['tongnotoida']; ?>">
    </div>
    VNĐ
  </div>
  <div class="form-group row">
    <label for="inputnumber3" class="col-sm-6 col-form-label">Số lượng tồn tối thiểu sau khi bán</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="inputnumber3" name="soluongtontoithieusaukhiban" value="<?php echo selectAll("thamso","sudungquydinh4",$conn)[0]['soluongtontoithieusaukhiban']; ?>">
    </div>
  </div>
    <fieldset class="form-group">
    <div class="row">
      <label for="inputnumber3" class="col-sm-6 col-form-label">Số tiền thu có thể vượt quá số tiền khách hàng đang nợ hay không ?</label>
      <div class="col-sm-4">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sudungquydinh4" id="gridRadios1" value="1" <?php if(selectAll("thamso","sudungquydinh4",$conn)[0]['sudungquydinh4'] == 1){ echo "checked"; }; ?> >
          <label class="form-check-label" for="gridRadios1">
              Có 
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sudungquydinh4" id="gridRadios2" value="0" <?php if(selectAll("thamso","sudungquydinh4",$conn)[0]['sudungquydinh4'] == 0){ echo "checked"; }; ?>>
          <label class="form-check-label" for="gridRadios2">
              Không
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-7">
      <button type="submit" class="btn btn-primary" name="change">Thay đổi quy định</button>
    </div>
  </div>
</form> 