
<main class="col-10">
	<center class="mt-2"><h1>Quản lý sản phẩm</h1></center>
	<section>
		<div class="d-flex">
			<div class="container-fluid">
				<a href="product&action=add"><button class="btn btn-success">Thêm sản phẩm</button></a>
			</div>
			<div class="container-fluid w-50">
				<div class="d-flex border border-dark rounded">
					<input class="form-control border-0 sm-2 rounded-start" type="search" placeholder="Search..." aria-label="Search" name="s" id="myInput">
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<table class="table table-hover mt-4">
				<thead class="table-dark">
					<tr>
				      <th scope="col">#</th>
				      <th scope="col" style="width: 10rem">Tên sản phẩm</th>
				      <th scope="col">Thumnail</th>
				      <th scope="col" class="text-center">Giá ₫</th>
				      <th scope="col">Discount</th>
				      <th scope="col" class="text-center" style="width: 10rem">Tên danh mục</th>
				      <th scope="col" class="text-center" style="width: 20rem">Mô tả</th>
				      <th scope="col" style="width: 3rem"></th>
				      <th scope="col" style="width: 3rem"></th>
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
					
					foreach ($product as $item) {
						$shortTitle = $item['tenSanPham'];
						if(strlen($shortTitle) > 15){
							$shortTitle = substr($shortTitle, 0, 15);
							$shortTitle = $shortTitle;
						}
						$shortDescribe = $item['moTaSanPham'];
						if(strlen($shortDescribe) > 35){
							$shortDescribe = substr($shortDescribe, 0, 35);
							$shortDescribe = $shortDescribe.'...';
						}
					 	echo '<tr class="border-left border-right border-bottom">
								  <th scope="row">'.++$firstIndex.'</th>
								  <td>'.$shortTitle.'
								  	<a href="#demo'.$item['id_product'].'" class="text-info" data-toggle="collapse">...</a>
									<div id="demo'.$item['id_product'].'" class="collapse">
									'.$item['tenSanPham'].'
									</div>
									</td>
								  <td>
								  	<img class="rounded" src="./assets/image/'.$item['thumnail'].'" style="width: 3rem">
								  </td>
								  <td>'.number_format($item['price'],0,'','.').'</td>
								  <td><center>'.$item['discount'].'</center></td>
								  <td><center>'.$item['title_cate'].'</center></td>
								  <td>
								  	<a href="#describe'.$item['id_product'].'" class="text-dark" data-toggle="collapse">'.$shortDescribe.'</a>
									<div id="describe'.$item['id_product'].'" class="collapse">
									'.$item['moTaSanPham'].'
									</div>
									</td>
								  <th scope="col">
								  	<a href="product&action=add&id='.$item['id_product'].'">
									  	<button class="btn btn-primary text-white">
									  		<i class="far fa-edit"></i>
									  	</button>
									</a>
								  </th>
								  <th scope="col">
								  	<button class="btn btn-danger" onclick="deleteProduct('.$item['id_product'].')">
								  		<i class="far fa-trash-alt"></i>
								  	</button>
								  </th>
								</tr>';
					} 
					?>
					
				</tbody>
			</table>
		</div>
	</section>