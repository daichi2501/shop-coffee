<footer class="" style="background-color: #ff4f04">
	<section class="container d-flex">
		<div class="col-4">
			<div class="mt-3 mb-3 ml-1">
				<img src="./assets/image/NoNameee-03.png" class="rounded p-2" style="width:12rem; height:4.5rem; background-color: #fbfbfb">
			</div>
			<div class="d-flex">
				<ul class="nav flex-column">
					<li class="nav-item d-flex text-white">
						<i class="fas fa-map-marker-alt mt-1 mr-3"></i>
						<h6 class="mb-3">HUMG University</h6>
					</li>
					<li class="nav-item d-flex text-white">
						<i class="fas fa-phone-alt mt-1 mr-3"></i>
						<a class="text-white mb-3" href="tel:+84949389572">
							<h6 class="m-0">+84 336 363 191</h6>
						</a>
					</li>
					<li class="nav-item d-flex text-white">
						<i class="fas fa-envelope mt-1 mr-3"></i>
						<a class="text-white mb-3" href="nguyenchidai2000@gmail.com">
							<h6>nguyenchidai2000@gmail.com</h6>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-4">
			<div class="container">
				<div class="mb-4 pt-5 text-white"><h4>Hỗ trợ</h4></div>
				<ul class="nav flex-column">
					<li class="nav-item d-flex">
						<a href="home&action=foodsafety" class="text-white mb-3"><h6>Chứng nhận bộ y tế</h6></a>
					</li>
<!--					<li class="nav-item d-flex">
						<a href="home&action=refund" class="text-white mb-3"><h6>Chính sách đổi trả</h6></a>
					</li>
					<li class="nav-item d-flex">
						<a href="home&action=security" class="text-white mb-3"><h6>Chính sách bảo mật thông tin</h6></a>
					</li> -->
				</ul>
			</div>
		</div>
		<div class="col-4">
			<div class="container">
				<div class="mb-4 pt-5 text-white"><h4>Phương thức thanh toán</h4></div>
				<ul class="nav d-flex">
					<li class="nav-item d-flex">
						<img src="./assets/image/visa.png" class="rounded payment mr-2" style="width: 4rem;height: 3rem">
					</li>
					<li class="nav-item d-flex">
						<a href="https://nhantien.momo.vn/8QQlOd8EYZ1" target="_blank">
							<img src="./assets/image/logo-momo.png" class="payment mr-2" style="width: 3rem;height: 3rem">
						</a>
					</li>
					<li class="nav-item d-flex">
						<img src="./assets/image/zalo-pay.png" class="payment mr-2" style="width: 3rem;height: 3rem">
					</li>
					<li class="nav-item d-flex">
						<img src="./assets/image/logo-apay.png" class="rounded payment mr-2" style="width: 3rem;height: 3rem">
					</li>
				</ul>
				<h6></h6>
			</div>
		</div>
	</section>
	<div class="text-white w-100" style="background-color: #f9f9f9; height: 1px;"></div>
	<section class="container">
		<div class="container-fluid d-flex p-3 justify-content-center">
			<div class="text-white d-flex align-items-center">
				<h6 class="mt-1">© Copyright NCD. Developed by NCD</h6>
				<ul class="nav d-flex ml-5">
					<li class="nav-item d-flex mr-3">
						<a href="https://www.facebook.com/daichi25" target="_blank" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
					</li>
					<li class="nav-item d-flex mr-3">
						<a href="" target="_blank" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
					</li>
					<li class="nav-item d-flex mr-3">
						<a href="" target="_blank" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
					</li>
					<li class="nav-item d-flex mr-3">
						<a href="" target="_blank" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
					</li>
					<li class="nav-item d-flex mr-3">
						<a href="" target="_blank" class="text-white"><i class="fab fa-instagram fa-lg"></i></i></a>
					</li>
				</ul>
			</div>
		</div>
	</section>
</footer>
<button class="btn btn-dark" id="myBut" onclick="topFunction()" style="display: none;">
	<i class="fa fa-angle-double-up"></i>
</button>
<script type="text/javascript" src="./assets/js/functionIndex.js"></script>
<script type="text/javascript">
	function addToCart(id){
		$.post('order&action=add', {
			'id' : id,
			'action' : 'add'
		},function (data){
			location.reload();
		})
	};
</script>
<script type="text/javascript">
	function removeProduct(id){
		$.post('order&action=deleteFrontEnd', {
			'id' : id,
			'action' : 'deleteFrontEnd'
		},function (data){
			location.reload();
		})
	}
</script>