<div class="container-fluid border-bottom">
	<nav class="pt-3 pb-3">
		<ol class="bg-white d-flex m-0">
			<li class="breadcrumb-item"><a href="home" class="a-portfolio text-dark font-weight-bold">Trang chủ</a></li>
			<li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
		</ol>
	</nav>
</div>
<div class="container-fluid d-flex pr-0 pt-3 pb-3">
	<div class="col-3">
		<nav class="navbar-dark navbar-fixed-left" id="sidebar-wrapper">
			<div class="list-group list-group-flush mt-2 mb-2 rounded">
				<h5 class="bg-light p-3 m-0 rounded">Danh mục sản phẩm</h5>
				
			</div>
		</nav>
	</div>
	<div class="col-9">
		<div class="container-fluid">
			<div class="row row-cols-4">
				<?php
				foreach ($product as $product) {
					$price = number_format($product['price'],0,'','.');
					echo '<div class="col-3 mt-2 mb-3" style="height: 22rem">
							<div class="container-fluid border-0 bg-light h-100 position-relative pt-3 card">
								<div class="img">
									<a href="detail&action=show&id='.$product['id_product'].'">
										<img class="card-img-top border-0 img-thumbnail" src="./assets/image/'.$product['thumnail'].'" style="object-fit: fill; width: 15rem; height: 11rem">
									</a>
								</div>
								<div class="pt-2">
									<h6 class="card-title">
										<a href="detail&action=show&id='.$product['id_product'].'" class="text-dark card-title">
											'.$product['tenSanPham'].'
										</a>
									</h6>
								</div>
								<div class="price pt-2">
									<div class="price">
										<span class="text-dark">
											<bdi class="font-weight-bold">'.$price.'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span>
											</bdi>
										</span>
									</div>
								</div>
								<div class="ml-2 add-cart">
									<div>
										<button class="btn rounded-pill" style="width: 10rem" onclick="addToCart('.$product['id_product'].')">
											Thêm vào giỏ
										</button>
									</div>
								</div>
							</div>
						</div>';
				}
				?>
			</div>
		</div>
	</div>
</div>