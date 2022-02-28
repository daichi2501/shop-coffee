
<main class="col-10 position-relative">
	<center class="mt-2"><h1>Quản lý đơn hàng</h1></center>
	<section>
		<div class="d-flex mt-2">
			<div class="container-fluid">
				<!-- <a href="category&action=add" ><button class="btn btn-success">Thêm danh mục</button></a> -->
			</div>
			<div class="container-fluid w-50">
				<div class="d-flex border border-dark rounded">
					<input class="form-control border-0 sm-2 rounded-start" type="search" placeholder="Search..." aria-label="Search" name="s" value="" id="myInput">
				</div>
			</div>
		</div>
		<div class="container-fluid" id="myDIV">
			<table class="table table-hover mt-4">
				<thead class="table-dark">
					<tr class="border-right">
				      <th scope="col" style="width: 3rem">#</th>
				      <th scope="col" >Tài khoản</th>
				      <th scope="col" >Tên khách nhận</th>
				      <th scope="col" >Số điện thoại</th>
				      <th scope="col" >Địa chỉ</th>
				      <th scope="col" style="width: 3rem"></th>
				      <th scope="col" style="width: 3rem"></th>
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
						foreach ($paging as $item){
							echo '<tr class="border-left border-right border-bottom">
									<th scope="col">'.++$firstIndex.'</th>
									<td scope="col">'.$item['userName'].'</td>
									<td scope="col">'.$item['recipient_name'].'</td>
									<td scope="col">'.$item['phone'].'</td>
									<td scope="col">'.$item['receiver_address'].'</td>
									
									<th scope="col">
										<a href="order&action=detail&id='.$item['id_order_account'].'">
											<button class="btn btn-danger")">
												<i class="fas fa-id-card-alt"></i>
											</button>
										</a>
									</th>
									<th scope="col">
										<button class="btn btn-danger" onclick="deleteOrder('.$item['id_order_account'].')">
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

