<div class="container">
  <center class="mt-2"><h1>Thêm/Sửa sản phẩm</h1></center>
  <div class="container">
    <form method="POST">
      <?php
      if(isset($_GET['id'])){
        echo '
      <div class="d-flex">
        <div class="form-group col-9 pl-0">
          <label for="name">Tên sản phẩm:</label>
          <input type="number" name="id" value="'.$item['id_product'].'" hidden = "true">
          <input type="text" class="form-control" placeholder="" name="tenSanPham" value="'.$item['tenSanPham'].'">
        </div>
        <div class="form-group col-3 pr-0">
          <label for="">Lựa chọn danh mục:</label>
          <select class="form-control" id="id_category" name="id_category">
            <option>--Chọn danh mục--</option>';
            foreach ($cate as $value){
              if($value['id_category'] == $item['id_category']){
                echo'<option selected value="'.$value['id_category'].'">'.$value['title_cate'].'</option>';
              }
              else{
                echo'<option value="'.$value['id_category'].'">'.$value['title_cate'].'</option>';
              }
            }
            echo '</select>
        </div>
      </div>
      <div class="d-flex">
        <div class="form-group col-9 pl-0">
          <label for="price">Giá:</label>
          <input type="number" class="form-control" id="pwd" placeholder="" name="price" value="'.$item['price'].'">
        </div>
        <div class="form-group col-3 pr-0">
          <label for="discount">Discount:</label>
          <input type="number" class="form-control" id="pwd" placeholder="" name="discount" value="'.$item['discount'].'">
        </div>
      </div>
      <div class="form-group d-flex">
        <div class="col-1 pl-0">
          <img class="rounded" src="./assets/image/'.$item['thumnail'].'" style="width: 5rem">
        </div>
        <div class="mb-3 col-11 pr-0">
          <label for="formFile" class="form-label">Thumbnail <span class="text-danger">*</span></label>
          <input class="form-control" type="file" id="formFile" name="thumnail" value="'.$item['thumnail'].'" required>
        </div>
      </div>
      <div class="form-group">
        <label for="comment">Describe:</label>
        <textarea class="form-control" rows="5" name="describe">'.$item['moTaSanPham'].'</textarea> 
      </div>';
      }
      else{
        echo '
        <div class="d-flex">
          <div class="form-group col-9 pl-0">
            <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="number" name="id" value="" hidden="true">
            <input type="text" class="form-control" placeholder="Enter name" name="tenSanPham" required>
          </div>
          <div class="form-group col-3 pr-0">
            <label for="">Lựa chọn danh mục <span class="text-danger">*</span></label>
            <select class="form-control" id="id_category" name="id_category">
              <option>-- Chọn danh mục --</option>';
              foreach ($cate as $value){
                echo'<option value="'.$value['id_category'].'">'.$value['title_cate'].'</option>';
              }
              echo '</select>
          </div>
        </div>
      <div class="d-flex">
        <div class="form-group col-9 pl-0">
          <label for="price">Giá <span class="text-danger">*</span></label>
          <input type="number" class="form-control" id="pwd" placeholder="Enter price" name="price" required>
        </div>
        <div class="form-group col-3 pr-0">
          <label for="discount">Discount:</label>
          <input type="number" class="form-control" id="pwd" placeholder="Enter discount" name="discount">
        </div>
      </div>
      <div class="form-group">
        <div class="mb-3">
          <label for="formFile" class="form-label">Thumbnail <span class="text-danger">*</span></label>
          <input class="form-control" type="file" id="formFile" name="thumnail">
        </div>
      </div>
      <div class="form-group">
        <label for="comment">Describe:</label>
        <textarea class="form-control" rows="5" placeholder="Description" name="describe"></textarea> 
      </div>';
      }
      ?>
      <button type="submit" class="btn btn-success">Lưu</button>
    </form>
  </div>
</div>