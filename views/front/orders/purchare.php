<main>
	<section class="container-fluid">
		<div class=" d-flex">
			<div class="col-3 border-right">
				<div class="mt-3 d-flex">
					<img src="./assets/image/cat.gif" class="rounded-circle" style="width:6rem;height:6rem;" alt="your-avatar">
					<div class="d-flex align-items-center pl-3">
						<h5><?=$account['userName']?></h5>
					</div>
				</div>
				<div class="mt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link text-dark profile active" href="home&action=profile"><i class="fas fa-id-badge mr-2"></i>Thông tin cá nhân</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark profile" href="order&action=purchare"><i class="fas fa-shopping-basket mr-2"></i>Đơn mua</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
						</li> -->
					</ul>
				</div>
			</div>
			<div class="col-9 mt-3 pr-0 position-relative">
				<table class="table">
					<thead class="table-light">
						<tr>
					      <th scope="col" colspan="2" style="width: 10rem">Sản phẩm</th>
					      <th scope="col">Số lượng</th>
					      <th scope="col" class="text-center">Giá ₫</th>
					      <th scope="col" height="" class="text-center">Tổng tiền</th>
					      <th scope="col" style="width:3rem"></th>
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
											<th scope="col" class="">
												<button class="border-0 btn-dark rounded" onclick="removeProduct('.$item['id_product'].')">
											  		<i class="fas fa-times"></i>
											  	</button>
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
				<div class="container-fluid checkout pb-4 pt-5">
					<div class="d-flex">
						<div class="col-8">
							<div class="input-group mb-3">
							  <div class="input-group-prepend" >
							    <span class="input-group-text text-white bg-default">Voucher:</span>
							  </div>
							  <input type="text" class="form-control" placeholder="" aria-label="Voucher" name="voucher" aria-describedby="basic-addon1">
							</div>
							<?php
								$cart = [];
								if(isset($_SESSION['cart'])){
									$cart = $_SESSION['cart'];
									// print_r($cart);
									$total = 0;
									$totalCart = 0;
									foreach ($cart as $item) {
										$total = intval($item['price'])*intval($item['amount']);
										$totalCart += $total;
									}
									echo '<h4>Tổng thanh toán: <span style="color: #ff4f04">'.number_format($totalCart,0,'','.').'₫</span></h4>';
								}
								else{
									echo '<h4>Tổng thanh toán: <span>0</span>₫</h4>';
								}
							?>
						</div>
						<div class="col-4 d-flex align-items-end">
							<a href="order&action=shipment" class="pr-0 w-100">
								<button class="btn w-100 rounded-pill" style="">Thanh toán</button>
							</a>
							<a  class="pr-0 w-100">
								<button class="btn w-100 rounded-pill" style="" name="button" value="OK" type="button" onclick="In()">In Hóa Đơn</button>  
									<script>  
  										function In(){  
    										alert("Hóa Đơn Đã Được In");  
  										}  
								</script>
							</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
</main>