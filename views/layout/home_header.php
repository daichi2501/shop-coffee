<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		
	?>
	<title>NoName Company</title>
	<link rel="icon" href="./assets/image/NoNameee-01.png" type="image/png" >
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="./assets/css/styleIndex.css">
  	<script type="text/javascript" src="./assets/js/scripts.js"></script>
</head>
<body class="position-relative">
	<header class="bg-light sticky-top">
		<section class="d-flex container pt-2 pb-2">
			<div class="d-flex mt-1">
				<a href="home">
					<img src="./assets/image/NoNameee-03.png" style="width:9rem; height: 2.9rem; object-fit: cover;">
				</a>
			</div>
			<form class="input-group container rounded border p-0 col-7 mt-2 mb-2" method="GET">
				<input type="text" class="form-control border-0" placeholder="Tìm kiếm sản phẩm" aria-label="Recipient's username" autocomplete="off" aria-describedby="basic-addon2" name="search">
				<div class="input-group-append">
					<a href="home&action=search"><button class="btn btn-dark h-100" type="submit"><i class="fas fa-search"></i></button></a>
				</div>
			</form>
			<div class="d-flex group_icon ml-3 mt-2">
				<!--div class="d-flex pl-2">
					<a href="#">
						<i class="fas fa-heart fa-lg text-dark"></i>
					</a>
				</div--> 
				<?php
				if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['username'])){
					if(isset($_SESSION['username'])){
						$sessionUser = $_SESSION['username'];
					}
					if(isset($_SESSION['role'])){
						echo '<div class="d-flex pl-2">
							<a href="category" target="_blank" title="Admin">
								<i class="fas fa-user-cog fa-2x text-dark"></i>
							</a>
						</div>';
					}
					echo '<div class="dropdown ml-3">
						<button class="btn rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #ff4f04">
								<strong class="text-white">'.$sessionUser[0].'</strong>
						</button>
						<div class="dropdown-menu m-0">
							<a class="dropdown-item" href="home&action=profile">Tài khoản của tôi</a>
							<a class="dropdown-item" href="order&action=purchare">Đơn mua</a>
							<a class="dropdown-item" href="login&action=logout">Đăng xuất</a>
						</div>
					</div>';
				}
				else{
					echo '<div class="d-flex pl-2">
						<a href="login">
							<i class="fas fa-user fa-2x text-dark"></i>
						</a>
					</div>';
				}
				?>
				<?php 
					$cart = [];
					if(isset($_SESSION['cart'])){
						$cart = $_SESSION['cart'];
						// print_r($cart);
					}
					$count = 0;
					// echo '<pre>';
					// print_r($cart);
					// echo '</pre>';
					foreach ($cart as $item) {
						$count += intval($item['amount']);
					}
				?>
				<div class="d-flex ml-3">
					<a href="order&action=purchare" class="position-relative">
						<i class="fas fa-shopping-cart fa-2x text-dark"></i>
						<span class="badge rounded-circle text-white"style="background-color:#ff4f04">
							<?=$count?>
						</span>
					</a>
				</div>
			</div>
		</section>
	</header>
	<nav class="navbar navbar-expand container-fluid p-0" style="background-color: #FF4F04">
		<div class="container">
			<div class="dropdown">
				<a class="nav-link dropdown-toggle text-white p-3" href="detail" id="navbarDropdown" role="button" data-toggle="dropdown">
					<i class="fas fa-bars mr-1"></i>
					Tất cả sản phẩm
				</a>
				<div class="dropdown-menu m-0" aria-labelledby="navbarDropdown">
					<div class="container-fluid">
						<a class="dropdown-item" href="detail&action=portfolio&product=Đồ ăn"><i class="fas fa-laptop mr-1"></i>Đồ ăn</a>
						<a class="dropdown-item" href="detail&action=portfolio&product=Đồ uống"><i class="fas fa-desktop mr-1"></i>Đồ uống</a>
						<!--<a class="dropdown-item" href="detail&action=portfolio&product=Pha chế "><i class="far fa-hdd mr-1"></i>Pha chế</a> -->
					</div>
					
				</div>
			</div>
			<div class="collapse navbar-collapse pl-5" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item active pr-4">
						<a class="nav-link text-white p-3" href="home"><i class="fas fa-home mr-1"></i>Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="nav-item pr-4">
						<a class="nav-link text-white p-3" href="detail&action=portfolio&product=Giảm giá"><i class="fas fa-tags mr-1"></i>Giảm giá</a>
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link text-white p-3" href="home&action=preparation"><i class="fas fa-plus-circle mr-1"></i>Pha chế</a>
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link text-white p-3" href="home&action=regulations"><i class="fas fa-dollar-sign mr-1"></i></i>Nội quy</a>
					</li>

					<li class="nav-item dropdown pr-4">
						<a class="nav-link dropdown-toggle text-white p-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-info-circle"></i>
						Hỗ trợ
						</a>
						<div class="dropdown-menu m-0 pt-1" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="home&action=foodsafety">Chứng nhận bộ y tế </a>
							<!--<a class="dropdown-item" href="home&action=refund">Chính sách đổi trả</a>
							<div class="dropdown-divider"></div> 
							<a class="dropdown-item" href="home&action=security">Chính sách bảo mật thông tin</a>--> 
						</div> 
					</li>
					<li class="nav-item pr-4">
						<a class="nav-link text-white p-3" href="tel:+84949389572"><i class="fas fa-phone-square-alt mr-1"></i>Liên hệ</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>