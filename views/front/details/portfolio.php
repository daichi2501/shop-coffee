<div class="container-fluid border-bottom">
	<nav class="pt-3 pb-3">
		<ol class="bg-white d-flex m-0">
			<li class="breadcrumb-item"><a href="home" class="a-portfolio text-dark font-weight-bold">Trang chủ</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?=$productName?></li>
		</ol>
	</nav>
</div>
<div class="container-fluid d-flex pt-3 pb-3">
	<div class="col-3">
		<nav class="navbar-dark navbar-fixed-left" id="sidebar-wrapper">
			<div class="list-group list-group-flush mt-2 mb-2 rounded">
				<h5 class="bg-light p-3 m-0 rounded">Danh mục sản phẩm</h5>
				<?php

					$data = [];
					foreach($alldata as $item){
						$data[] = $item['title_cate'];
					}
					if(isset($_GET['product'])){
						$category = $_GET['product'];

						$key = array_search($category, $data);
						$replace = array($key => '');
						$data = array_replace($data, $replace);
			
						for($i=0; $i<count($data); $i++){
							if($data[$i]==''){
								echo '<a href="" class="list-group-item list-group-item-action text-white" style="background-color: #ff4f04" aria-current="true">
								'.$category.'
  									</a>';
							}
							else{
								echo '<a href="detail&action=portfolio&product='.$data[$i].'" class="list-group-item list-group-item-action">'.$data[$i].'</a>';
							}
						}
					}
				?>
			</div>
		</nav>
	</div>
	<div class="col-9">
		<div class="container-fluid">
			<div class="row row-cols-4">
				<?php
				if($productPort!= null && count($productPort)>0){
					foreach ($productPort as $product) {
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
				}
				else{
					echo '<div class="d-flex flex-column align-items-center justify-content-center container-fluid p-3" 
							style="height: 14.4rem;">
							<h5 class="text-center pb-3">Chưa có sản phẩm nào</h5>
							<center>
								<button class="btn">
									<a href="home" class="text-white">Đi tới trang chủ</a>
								</button>
							</center>
						</div>';
				}
				?>
			</div>
		</div>
	</div>
</div>