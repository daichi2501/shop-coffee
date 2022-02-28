
	<main>
		<section>
			<div class="container-fluid bg-light p-3">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<!-- <ol class="carousel-indicators  slide_show">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active rounded-circle"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1" class="rounded-circle "></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2" class="rounded-circle"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3" class="rounded-circle"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="4" class="rounded-circle"></li>
					</ol> -->
					<div class="carousel-inner rounded">
						<div class="carousel-item active">
							<img class="d-block img_show " src="./assets/image/slider_3.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img_show" src="./assets/image/slider_2.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img_show" src="./assets/image/slider_1.jpg" alt="Third slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img_show" src="./assets/image/slider_5.jpg" alt="fourth slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img_show" src="./assets/image/slider_4.jpg" alt="fifth slide">
						</div>
					</div>
					<a class="carousel-control-prev icon-show previous-show" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon " aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next icon-show next-show" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon " aria-hidden="true"></span>
						<span class="sr-only ">Next</span>
					</a>
				</div>
			</div>
		</section>
		<section>
			<div class="pt-3">
				<div class="container-fluid pb-3">
					<div class="d-flex position-relative bg-default rounded pl-2 pr-2 p-2">
						<h2 class="text-white pl-3">Đồ ăn</h2>
						<a href="detail&action=portfolio&product=Đồ ăn" class="explore d-flex align-items-center text-white pr-4">Xem thêm<i class="fas fa-angle-right ml-1"></i></a>
					</div>
				</div>
				<div class="container-fluid">	
					<div class="row row-cols-4">
						<?php
						foreach ($productDA as $product) {
							$price = number_format($product['price'],0,'','.');
							echo '<div class="col-3 mt-2 mb-3" style="height: 30rem">
								<div class="container-fluid border-0 bg-light h-100 position-relative pt-3 card">
									<div class="img">
										<a href="detail&action=show&id='.$product['id_product'].'">
											<img class="card-img-top border-0 img-thumbnail" src="./assets/image/'.$product['thumnail'].'" style="object-fit: fill; width: 27rem; height: 18rem">
										</a>
									</div>
									<div class="pt-2">
										<h5 class="card-title">
											<a href="detail&action=show&id='.$product['id_product'].'" class="text-dark card-title">
												'.$product['tenSanPham'].'
											</a>
										</h5>
									</div>
									<div class="price pt-2">
										<div class="price">
											<span class="text-dark">
												<bdi class="font-weight-bold">'.$price.'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span>
												</bdi>
											</span>
										</div>
									</div>
									<div class="ml-5 pl-2 add-cart">
										<button class="btn rounded-pill" style="width: 10rem" onclick="addToCart('.$product['id_product'].')">
											Thêm vào giỏ
										</button>
									</div>
								</div>
							</div>';
						}
						?>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="pt-3">
				<div class="container-fluid pb-3">
					<div class="d-flex position-relative bg-default rounded pl-2 pr-2 p-2">
						<h2 class="text-white pl-3">Đồ uống</h2>
						<a href="detail&action=portfolio&product=Đồ uống" class="explore d-flex align-items-center text-white pr-4">Xem thêm<i class="fas fa-angle-right ml-1"></i></a>
					</div>
				</div>
				<div class="container-fluid">	
					<div class="row row-cols-4">
						<?php
						foreach ($productDU as $product) {
							$price = number_format($product['price'],0,'','.');
							echo '<div class="col-3 mt-2 mb-3" style="height: 30rem">
								<div class="container-fluid border-0 bg-light h-100 position-relative pt-3 card">
									<div class="img">
										<a href="detail&action=show&id='.$product['id_product'].'">
											<img class="card-img-top border-0 img-thumbnail" src="./assets/image/'.$product['thumnail'].'" style="object-fit: fill; width: 27rem; height: 18rem">
										</a>
									</div>
									<div class="pt-2">
										<h5 class="card-title">
											<a href="detail&action=show&id='.$product['id_product'].'" class="text-dark card-title">
												'.$product['tenSanPham'].'
											</a>
										</h5>
									</div>
									<div class="price pt-2">
										<div class="price">
											<span class="text-dark">
												<bdi class="font-weight-bold">'.$price.'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span>
												</bdi>
											</span>
										</div>
									</div>
									<div class="ml-5 pl-2 add-cart">
										<button class="btn rounded-pill" style="width: 10rem" onclick="addToCart('.$product['id_product'].')">
											Thêm vào giỏ
										</button>
									</div>
								</div>
							</div>';
						}
						?>
					</div>
				</div>
			</div>
		</section>
		<div class="container-fluid text-center position-relative mt-5 p-2">
			<a href="detail" class="text-dark view-all">Tất cả sản phẩm</a>
		</div>
		

		<section  class="container-fluid p-0 bg-image mt-5 mb-5 position-relative"  style="height: 30rem;">
			<div class="container m-auto h-100 d-flex align-items-center">
				<div class="rounded bg-light text-dark p-4 bg-gradient" style="width: 20rem;">
					<h3 class="text-white"><center>Ưu đãi cực khủng<br>giảm ngay 10% khi đi từ 5 người trở lên</center> </h3>
					<a href=""></a>
					<!-- <button class="btn text-white shop-now rounded-pill" style="background-color: #ff4f04">Đặt hàng ngay
					</button> -->
				</div>
			</div>
		</section>

	</main>
	<script type="text/javascript">
		
	</script>
	