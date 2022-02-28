
<main class="col-10 position-relative">
	<center class="mt-2"><h1>Quản lý kho hàng</h1></center>
	<section>
		<div class="d-flex mt-2">
			<div class="container-fluid">
				<a href="stock&action=add" ><button class="btn btn-success">Nhập xuất sản phẩm</button></a>
			</div>
			<div class="container-fluid w-50">
				<div class="d-flex border border-dark rounded">
					<input class="form-control border-0 sm-2 rounded-start" type="search" placeholder="Search..." aria-label="Search" name="s" value="" id="myInput">
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<table class="table table-hover mt-4">
				<thead class="table-dark">
					<tr>
				      <th scope="col">#</th>
				      <th scope="col" >Tên sản phẩm</th>
				      <th scope="col" >Amount</th>
				      <th scope="col" >Hành động</th>
				      <th scope="col" >Thời gian tạo</th>
				      <th scope="col" >Thời gian cập nhật</th>
				      <th scope="col" >Nhận xét</th>
				      <th scope="col" style="width: 3rem"></th>
				      <th scope="col" style="width: 3rem"></th>
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
						foreach ($paging as $item){
							echo '<tr class="border-left border-right border-bottom">
									<th scope="col">'.++$firstIndex.'</th>
									<td scope="col">'.$item['tenSanPham'].'</td>
									<td scope="col">'.$item['amount'].'</td>
									<td scope="col">'.$item['action'].'</td>
									<td scope="col">'.$item['created_time'].'</td>
									<td scope="col">'.$item['update_time'].'</td>
									<td scope="col">'.$item['report'].'</td>
									<th scope="col">
										<a href="stock&action=add&id='.$item['id_stock'].'">
											<button class="btn btn-primary text-white">
												<i class="far fa-edit"></i>
											</button>
										</a>
									</th>
									<th scope="col">
										<button class="btn btn-danger" onclick="deleteStock('.$item['id_stock'].')">
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

