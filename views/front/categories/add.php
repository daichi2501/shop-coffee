
<div class="container">
	<center class="mt-2"><h1>Thêm/Sửa danh mục</h1></center>
	<form method="POST">
		<div class="form-group">
			<label for="email">Tên danh mục:</label>
			<input type="number" name="id" value="<?=$item['id_category']?>" hidden="true">
			<?php
			if(isset($_GET['id'])){
				echo '<input type="text" class="form-control" id="email" value="'.$item['title_cate'].'" placeholder="" name="title">';
			}
			else{
				echo '<input type="text" class="form-control" id="email" placeholder="" name="title" required>';
			}
			?>
		</div>
		<button type="submit" class="btn btn-success">Lưu</button>
	</form>
</div>