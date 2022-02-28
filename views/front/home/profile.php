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
						<a class="nav-link text-dark profile active" href=""><i class="fas fa-id-badge mr-2"></i>Thông tin cá nhân</a>
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
		<div class="col-9 p-4">
			<h3 class="mb-3">Thông tin cá nhân</h3>
			<div class="text-white w-100 bg-dark mb-3" style="height: 1px;"></div>
			<div class="form-group">
				<div class="col p-0 d-flex">
					<label for="name" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
						<i class="fas fa-id-card pr-1"></i>Họ tên:
					</label>
					<input type="text" class="form-control border-0" readonly placeholder="Enter your name" value="<?=$account['hoTen']?>" name="fullname">
				</div>
			    <!-- <div class="col-5 pr-0 d-flex flex-column">
			    	<label class="mb-3">Gender:</label>
			    	<div>
			    		<div class="pretty p-default p-round">
					        <input type="radio" name="radio1">
					        <div class="state">
					            <label><i class="fas fa-male"></i></label>
					            
					        </div>
					    </div>

					    <div class="pretty p-default p-round">
					        <input type="radio" name="radio1">
					        <div class="state">
					            <label>Female</label>
					            <i class="fas fa-female"></i>
					        </div>
					    </div>

					    <div class="pretty p-default p-round">
					        <input type="radio" name="radio1">
					        <div class="state">
					            <label>Special</label>
					        </div>
					    </div>
			    	</div>
			    </div> -->
			</div>
			<div class="form-group d-flex">
				<label for="birthday" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
					<i class="fas fa-calendar-week pr-1"></i>Ngày sinh:
				</label>
				<input required="birthday" type="date" class="form-control border-0" placeholder="Enter your name" readonly value="<?=$account['dob']?>" name="dob">
			</div>
			<div class="form-group d-flex">
				<label for="email" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
					<i class="fas fa-envelope pr-1"></i>Email:
				</label>
				<?php 
					$email = $account['email'];
					$hideEmail = '';
					for($i=0; $i<strlen($email); $i++){
						if($email[$i]!= '@' && $i>1 && $i<strpos($email, '@')){
							$hideEmail = $hideEmail.'*';
						}
						else{
							$hideEmail = $hideEmail.$email[$i];
						}
					}
					echo '<input type="email" class="form-control border-0" readonly value="'.$hideEmail.'" placeholder="Enter email" name="email">';
				?>
				
			</div>
			<div class="form-group d-flex">
				<label for="username" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
					<i class="fas fa-user pr-1"></i>User Name:
				</label>
				<input type="text" class="form-control border-0" readonly value="<?=$account['userName']?>" placeholder="Enter username" name="username">
			</div>
			<div class="form-group d-flex">
				<label for="email" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
					<i class="fas fa-phone pr-1"></i>Điện thoại:
				</label>
				<?php 
					$phone = $account['soDienThoai'];
					$dem = strlen($phone);
					$hide = str_repeat("*", $dem-2).$phone[$dem-2].$phone[$dem-1];
					echo '<input type="text" class="form-control border-0" readonly value="'.$hide.'" placeholder="Enter your phone" name="phone">';
				?>
			</div>
			<div class="form-group d-flex">
				<label for="address" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
					<i class="fas fa-map-marker-alt pr-1"></i>Địa chỉ:
				</label>
				<input type="text" class="form-control border-0" readonly value="<?=$account['diaChi']?>" placeholder="Enter your address" name="address">
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Sửa hồ sơ
			</button>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="p-4" method="POST">
							<div class="modal-body">
								<div class="form-group d-flex">
									<label for="name" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
									Họ tên:
									</label>
									<input type="text" class="form-control border-0" placeholder="Enter your name" value="<?=$account['hoTen']?>" id="fullname" name="fullname">
								</div>
								<div class="form-group d-flex">
									<label for="birthday" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
									Ngày sinh:
									</label>
									<input required="birthday" type="date" class="form-control border-0" placeholder="Enter your name" id ="dob" value="<?=$account['dob']?>" name="dob">
								</div>
								<div class="form-group d-flex">
									<label for="email" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
									Email:
									</label>
									<input type="email" class="form-control border-0" id="email" value="<?=$account['email']?>" placeholder="Enter email" name="email">
								</div>
								<div class="form-group d-flex">
									<label for="email" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
									Điện thoại:
									</label>
									<input type="text" class="form-control border-0" value="<?=$account['soDienThoai']?>" placeholder="Enter your phone" id="phone" name="phone">
								</div>
								<div class="form-group d-flex">
									<label for="address" class="d-flex align-items-center pr-1 m-0" style="width:10rem;">
									Địa chỉ:
									</label>
									<input type="text" class="form-control border-0" value="<?=$account['diaChi']?>" placeholder="Enter your address" id="address" name="address">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
								<button type="submit" id="edit" class="btn btn-primary">Lưu</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	$(document).ready(function(){
    // Khi người dùng click Sửa
    $('#edit').click(function(){
        // Lấy dữ liệu
        var data = {
            fullname    : $('#fullname').val(),
            dob    		: $('#dob').val(),
            email    	: $('#email').val(),
            phone       : $('#phone').val(),
            address    	: $('#address').val()
        };
        // Gửi ajax
        $.ajax({
            type : "post",
            dataType : "JSON",
            url : "register&action=edit",
            data : data
        });
    });
});
</script>