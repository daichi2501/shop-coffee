<main>
	<section class="container-fluid d-flex">
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
		<div class="col-9">
			<form class="p-4" method="POST">
				<h3 class="mb-3">Thông tin cá nhân</h3>
				<div class="text-white w-100 bg-dark mb-3" style="height: 1px;"></div>
				<div class="form-group d-flex">
					<div class="col-6 pl-0 d-flex">
						<label for="name" class="d-flex align-items-center pr-1 m-0" style="width:12.5rem;">
							Full Name:
						</label>
						<input type="text" class="form-control border-0" placeholder="Enter your name" value="<?=$account['hoTen']?>" name="fullname">
					</div>
					<div class="col-6 pr-0 d-flex">
						<label for="birthday" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
							Birthday:
						</label>
						<input required="birthday" type="date" class="form-control border-0" placeholder="Enter your name" id ="dob" value="<?=$account['dob']?>" name="dob">
					</div>
				</div>
				
				<div class="form-group d-flex">
					<label for="email" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
						Email:
					</label>
					<input type="email" class="form-control border-0" id="email" value="<?=$account['email']?>" placeholder="Enter email" name="email">
				</div>
				<div class="form-group d-flex">
					<label for="email" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
						Phone:
					</label>
					<input type="text" class="form-control border-0" value="<?=$account['soDienThoai']?>" placeholder="Enter your phone" name="phone">
				</div>
				<div class="form-group d-flex">
					<label for="address" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
						Address:
					</label>
					<input type="text" class="form-control border-0" value="<?=$account['diaChi']?>" placeholder="Enter your address" name="address">
				</div>
				<button type="submit" class="btn btn-dark register mt-3">
					Lưu
				</button>
			</form>
		</div>
		
	</section>
</main>