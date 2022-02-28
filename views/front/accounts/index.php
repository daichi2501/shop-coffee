
<main class="col-10 position-relative">
	<center class="mt-2"><h1>Quản lý tài khoản</h1></center>
	<section>
		<div class="d-flex mt-2">
			<div class="container-fluid">
				<a href="category&action=add" hidden="true"><button class="btn btn-success">Thêm tài khoản</button></a>
			</div>
			<div class="container-fluid w-50">
				<div class="d-flex border border-dark rounded">
					<input class="form-control border-0 sm-2 rounded-start" type="search" placeholder="Search..." aria-label="Search" name="s" id="myInput">
				</div>
			</div>
		</div>
		<div>
			<form method="POST">
				
			</form>
		</div>
		<div class="container-fluid">
			<table class="table table-hover mt-4">
				<thead class="table-dark">
					<tr>
				      <th scope="col">#</th>
				      <th scope="col">Tên người dùng</th>
				      <th scope="col">DoB (y/m/d)</th>
				      <th scope="col">Tên tài khoản</th>
				      <th scope="col">Email</th>
				      <th scope="col">Số điện thoại</th>
				      <th scope="col">Địa chỉ</th>
				      <th scope="col" class="text-center">Chức vụ</th>
				      <th scope="col" style="width: 3rem"></th>
				      <!--th scope="col" style="width: 3rem"></th-->
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
					//print_r($category);
						foreach ($accountPaging as $item){
							echo '<tr class="border-left border-right border-bottom">
									<th scope="col">'.++$firstIndex.'</th>
									<td scope="col">'.$item['hoTen'].'</td>
									<td scope="col">'.$item['dob'].'</td>
									<td scope="col">'.$item['userName'].'</td>
									<td scope="col">'.$item['email'].'</td>
									<td scope="col">'.$item['soDienThoai'].'</td>
									<td scope="col" style="width:6rem">'.$item['diaChi'].'</td>
									<th scope="col">
										<a href="account&action=addrole&id='.$item['id_account'].'&role='.$item['id_role'].'">
											<button class="btn btn-warning text-white" style="width: 7rem; height: 2.5rem">
												'.$item['name_role'].'
											</button>
										</a>
									</th>
									<!--th scope="col">
										<a href="account&action=add&id='.$item['id_account'].'">
											<button class="btn btn-primary text-white">
												<i class="far fa-edit"></i>
											</button>
										</a>
									</th-->
									<th scope="col">
										<button class="btn btn-danger" onclick="deleteAccount('.$item['id_account'].', '.$item['id_role'].')">
											<i class="far fa-trash-alt"></i>
										</button>
									</th>
								</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</section>
