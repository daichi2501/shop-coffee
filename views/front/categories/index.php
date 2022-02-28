
<main class="col-10 position-relative">
	<center class="mt-2"><h1>Quản lý danh mục</h1></center>
	<section>
		<div class="d-flex mt-2">
			<div class="container-fluid">
				<a href="category&action=add" ><button class="btn btn-success">Thêm danh mục</button></a>
			</div>
			<div class="container-fluid w-50">
				<div class="d-flex border border-dark rounded">
					<input class="form-control border-0 sm-2 rounded-start" type="search" placeholder="Search..." aria-label="Search" name="s" value="" id="myInput">
				</div>
			</div>
		</div>
		<div class="container-fluid" id="myDIV">
			<table class="table table-hover mt-4">
				<thead class="table-dark">
					<tr class="border-right">
				      <th scope="col" style="width: 10rem">#</th>
				      <th scope="col" >Tên danh mục</th>
				      <th scope="col" style="width: 3rem"></th>
				      <th scope="col" style="width: 3rem"></th>
				    </tr>
				</thead>
				<tbody id="myTable">
					<?php
						foreach ($paging as $item){
							echo '<tr class="border-left border-right border-bottom">
									<th scope="col">'.++$firstIndex.'</th>
									<td scope="col">'.$item['title_cate'].'</td>
									<th scope="col">
										<a href="category&action=add&id='.$item['id_category'].'">
											<button class="btn btn-primary text-white">
												<i class="far fa-edit"></i>
											</button>
										</a>
									</th>
									<th scope="col">
										<button class="btn btn-danger" onclick="deleteCategory('.$item['id_category'].')">
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

