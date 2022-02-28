
<div class="container">
	<center class="mt-2"><h1>Thêm/Sửa kho hàng</h1></center>
	<form method="POST">

		<?php
			if(isset($_GET['id'])){
				echo'
				<div class="d-flex">
					<div class="form-group col-6 pl-0">
						<label for="">Tên sản phẩm:</label>
						<input type="number" name="id" value="'.$item['id_stock'].'" hidden="true">
						<select class="form-control" id="id_product" name="id_product">
							<option>-- Chọn sản phẩm --</option>';
							foreach ($productAllName as $value){
								if($item['id_product'] == $value['id_product']){
									echo'<option selected value="'.$value['id_product'].'">'.$value['tenSanPham'].'</option>';
								}
							}
						echo '
						</select>
					</div>
					<div class="form-group col-6 pr-0">
						<label for="">Hành động :</label>
						<select class="form-control" id="action" name="action_stock">
							<option>-- Chọn hành động --</option>';
							$action = ['Nhập hàng', 'Xuất hàng'];
							for($i=0; $i<count($action); $i++){
								echo'<option selected value="'.$action[$i].'">'.$action[$i].'</option>';
							}
				echo '
						</select>
					</div>
				</div>
				<div class="form-group">
			        <label for="price">Số lượng:</label>
			        <input type="number" class="form-control" id="" placeholder="Enter amount" name="amount" value="'.$item['amount'].'" required>
			    </div>
			    
					<div class="form-group">
						<label for="comment">Báo cáo:</label>
						<textarea class="form-control" rows="5" placeholder="Report" name="report">'.$item['report'].'</textarea> 
					</div>';
			}
			else{
				echo '
				<div class="d-flex">
					<div class="form-group col-6 pl-0">
						<label for="">Tên sản phẩm:</label>
						<input type="number" name="id" hidden="true">
						<select class="form-control" id="id_product" name="id_product">
							<option>-- Chọn sản phẩm --</option>';
							foreach ($productAllName as $value){
								echo'<option value="'.$value['id_product'].'">'.$value['tenSanPham'].'</option>';
							} 
						echo'
						</select>
					</div>
					<div class="form-group col-6 pr-0">
					<label for="">Hành động :</label>
					<select class="form-control" id="action" name="action_stock">
						<option>-- Chọn hành động --</option>';
						$action = ['Nhập hàng', 'Xuất hàng'];
						for($i=0; $i<count($action); $i++){
							echo'<option value="'.$action[$i].'">'.$action[$i].'</option>';
						}
					echo'
					</select>
				</div>
				</div>
				<div class="form-group">
			        <label for="price">Số lượng:</label>
			        <input type="number" class="form-control" id="" placeholder="Enter amount" name="amount" required>
			    </div>
	    		
			    <div class="form-group">
					<label for="comment">Báo cáo:</label>
					<textarea class="form-control" rows="5" placeholder="Report" name="report"></textarea> 
				</div>';
			}
		?>
			
		<button type="submit" class="btn btn-success">Lưu</button>
	</form>
</div>