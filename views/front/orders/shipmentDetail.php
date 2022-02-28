<section class="container-fluid mt-4 mb-4">
	<form method="POST" class="d-flex">
		<div class="col-5">
			
			<div class="form-group">
				<label for="phone">Mã số thẻ</label>
				<input type="text" class="form-control"  placeholder="Enter the code" name="number" required>
			</div>
			
			 <div class="form-group">
				<label for="comment">Ghi chú:</label>
				<textarea class="form-control" rows="5" placeholder="" name="note"></textarea> 
			</div>
		</div>
		<div class="col-7">
			<table class="table">
				<thead class="table-light">
					<tr>
				      <th scope="col" colspan="2" style="width: 10rem">Sản phẩm</th>
				      <th scope="col">Số lượng</th>
				      <th scope="col" class="text-center">Giá ₫</th>
				      <th scope="col" height="" class="text-center">Tổng tiền</th>
				    </tr>
				    
				</thead>
				<tbody>
					<?php
						$cart = [];
						if(isset($_SESSION['cart'])){
							$cart = $_SESSION['cart'];
							//print_r($cart);
							if(count($cart)>0){
								$total = 0;
								foreach ($cart as $item) {
									$total = intval($item['price'])*intval($item['amount']);
									$shortTitle = $item['tenSanPham'];
									if(strlen($shortTitle) > 12){
										$shortTitle = substr($shortTitle, 0, 12);
										$shortTitle = $shortTitle.'...';
									}
									echo '<tr>
										<th scope="col" style="width:3rem; height:4rem;">

											<img src="./assets/image/'.$item['thumnail'].'" style="width: 3rem">
										</th>
										<th scope="col">'.$shortTitle.'</th>
										<th scope="col">'.$item['amount'].'</th>
										<th scope="col" class="text-center">'.number_format($item['price'],0,'','.').'</th>
										<th scope="col" class="text-center">
											'.number_format($total,0,'','.').'
										</th>
									</tr>';
								}
							}
							else{
								echo '<tr class="bg-light">
							    	<th colspan="6">Chưa có sản phẩm nào trong giỏ hàng</th>
							    </tr>
							    <tr>
							    	<th colspan="6">
										<button class="btn rounded-pill">
											<a href="detail" class="text-white">
												Quay lại cửa hàng
											</a>
										</button>
									</th>
								</tr>';
							}
						}
					?>
				</tbody>
			</table>
			<div class="d-flex align-items-end">
				<button type="submit" class="btn w-100 rounded-pill" style="">Thanh toán</button>
			</div>
		</div>
	</form>
</section>
