
<div class="container">
	<center class="mt-2"><h1>Cấp quyền cho tài khoản</h1></center>
	<form method="POST">
		<?php
			
				echo '<div class="form-group">
					<label for="email">Họ tên:</label>
					<input type="number" name="id" value="'.$accountById['id_account'].'" hidden="true">
					<input type="text" class="form-control" id="email" value="'.$accountById['hoTen'].'" readonly name="username">
				</div>
				<div class="form-group">
					<label for="email">Tên tài khoản:</label>
					<input type="text" class="form-control" id="email" value="'.$accountById['userName'].'" readonly name="username">
				</div>
				<div class="form-group">
			        <label for="">Lựa chọn chức vụ:</label>
			        <select class="form-control" id="id_role" name="id_role">
			          <option>--Chọn chức vụ--</option>';
			          foreach ($role as $value){
			            if($value['id_role'] == $get_role){
			              echo'<option selected value="'.$value['id_role'].'">'.$value['name_role'].'</option>';
			            }
			            else{
			              echo'<option value="'.$value['id_role'].'">'.$value['name_role'].'</option>';
			            }
			          }
			          echo '</select>
			      </div>';
			
			?>
			<button type="submit" class="btn btn-success">Lưu</button>
	</form>
</div>