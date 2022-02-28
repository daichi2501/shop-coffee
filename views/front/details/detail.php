<div class="container-fluid border-bottom">
	<nav class="pt-3 pb-3">
		<ol class="bg-white d-flex m-0">
			<li class="breadcrumb-item"><a href="home" class="a-portfolio text-dark font-weight-bold">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="?controller=detail&action=portfolio&product=<?=$productDetail['title_cate']?>" class="a-portfolio text-dark font-weight-bold"><?=$productDetail['title_cate']?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?=$productDetail['tenSanPham']?></li>
		</ol>
	</nav>
</div>
<div class="container-fluid">
	<div class="container-fluid d-flex pt-4 pb-4">
		<div class="col-5">
			<div class="card">
	            <div class="card-body">
	                <div class="easyzoom ">
	                	<img class="mainimage" src="./assets/image/<?=$productDetail['thumnail']?>" style="object-fit: fill; width: 28rem; height:28rem">
	                </div>
	            </div>
	        </div>
		</div>
		<div class="col-7">
			<h3 style=""><?=$productDetail['tenSanPham']?></h3>
			<div class="bg-light w-100 rounded" style="height:3rem">
				<h4 class="d-flex align-items-center pl-3 h-100" style="color: #ff4f04;"><?=number_format($productDetail['price'],0,'','.')?> VND</h4>
			</div>
			<div class="container-fluid mt-3 pt-3 pb-3">
				<div class="container-fluid bg-light p-0" style="height: 1px;"></div>
				<ul class="list-group pt-4">
					<?php
						$nhanxet = explode(';',$productDetail['moTaSanPham']);
						for($i=0; $i<count($nhanxet); $i++){
							if($i==0){
								echo "<li class='list-group-item border-0 p-0'>✓ $nhanxet[$i]</li>";
							}
							else{
								echo "<li class='list-group-item border-0 p-0'>✓$nhanxet[$i]</li>";
							}
						}
					?>
				</ul>
			</div>
			<form method="POST">
				<div class="d-flex pt-3">
					<?php
					if($stock != null){
						foreach($stock as $item){
							if($item['amount'] > 0 && $totalInStock==1 && $item['action'] == 'Nhập hàng'){
								echo '<h6 class="d-flex align-items-center m-0 pr-3">Số lượng</h6>
									<input type="number" class="form-control" style="width: 6rem; height: 2rem;" name="amountProduct" value="" min="1" max="'.$item['amount'].'">
									<h6 class="d-flex align-items-center m-0 pl-3">'.$item['amount'].' sản phẩm có sẵn</h6>
								</div>
								<div class="d-flex pt-3">
									<button class="btn w-100 col-6 pl-3 rounded-pill" onclick="addToCart('.$productDetail['id_product'].')">Thêm vào giỏ hàng</button>
									<a href="checkout.php" class="col-6 pr-0">
										<button class="btn w-100 rounded-pill" style="">Mua ngay</button>
									</a>
								</div>';
							}
							elseif($totalInStock > 1){
								echo '<h6 class="d-flex align-items-center m-0 pr-3">Số lượng</h6>
									<input type="number" class="form-control" style="width: 6rem; height: 2rem;" name="amountProduct" value="" min="1" max="'.$totalInStock.'">
									<h6 class="d-flex align-items-center m-0 pl-3">'.$totalInStock.' sản phẩm có sẵn</h6>
								</div>
								<div class="d-flex pt-3">
									<button type="submit" class="btn w-100 col-6 pl-3 rounded-pill" onclick="addToCart('.$productDetail['id_product'].')">Thêm vào giỏ hàng</button>
									<a href="checkout.php" class="col-6 pr-0">
										<button class="btn w-100 rounded-pill" style="">Mua ngay</button>
									</a>
								</div>';
								break;
							}
							else{
								echo '<div class="container-fluid mt-4">
										<h6 class="bg-danger text-white p-2 rounded-pill">Hết hàng</h6>
									</div>
								</div>';
							}
						}
					}
					else{
						echo '<div class="container-fluid mt-4">
								<h5 class="text-center bg-danger text-white p-2 rounded-pill">Hết hàng</h5>
							</div>
						</div>';
					}
					?>
				
			</form>
			
		</div>
	</div>
</div>
