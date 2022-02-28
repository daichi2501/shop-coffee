
<main class="col-10 position-relative">
	<center class="mt-2"><h1>Chi tiết đơn hàng</h1></center>
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
				      <th scope="col" >Tên sản phẩm</th>
				      <th scope="col" >Số lượng</th>
				      <th scope="col" >Giá tiền</th>
				      <th scope="col" >Tổng tiền</th>
				      <th scope="col" style="width: 10rem"></th>
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
					$firstIndex = 0;
						foreach ($order_detail as $item){
							echo '<tr class="border-left border-right border-bottom">
									<th scope="col">'.++$firstIndex.'</th>
									<td scope="col">'.$item['tenSanPham'].'</td>
									<td scope="col">'.$item['amount'].'</td>
									<td scope="col">'.number_format($item['price'],0,'','.').'</td>
									<td scope="col">'.number_format($item['amount']*$item['price'],0,'','.').'</td>
									<th scope="col">
										<select class="form-control">
										  <option>Đã thanh toán</option>
										  
										</select>
									</th>
								</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</section>

