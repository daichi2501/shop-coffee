<?php

class CategoryController extends BaseController
{
	const LIMIT = 4;
	private $table;
	private $categoryModel;

	public function __construct(){
		$this->loadModel('CategoryModel');
		$this->categoryModel = new CategoryModel();
	}

	public function index()
	{
		$selectColumn = [
			'id_category',
			'title_cate'];
		$order = [
			'column' => 'id_category',
			'order' => 'asc'
		];	
		
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$category = $this->categoryModel->selectAllCategory($selectColumn, $order);

			$count = count($category);
			$number = ceil($count/self::LIMIT);

			$page = $this->getGet('page');
			if($page>$number || $page<0 || empty($_GET['page'])){
				$page = 1;
			}
			$firstIndex = ($page-1)*self::LIMIT;
			
			$paging = $this->categoryModel->paging(self::LIMIT, $page);
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.categories.index',[
				'paging' => $paging,
				'firstIndex' => $firstIndex
			]);
			$this->includeView('layout.pagination',[
				'page' => $page,
				'number' => $number
			]);

			$this->includeView('layout.scriptDelete', [
				'controllerName' => $this->table = 'category'
			]);
			$this->includeView('layout.searchFilter');
		}
		else{
			header("Location: login");
			die();
		}
	}

	public function add(){
		//echo __METHOD__;
		$title = $id =  $name = '';
		$data = [];
		$values = [];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			if(!empty($_POST)){
			
				$title = $this->getPost('title');	
				$data[] = $title;
				$values[] = $title;
				
				$id = $this->getPost('id');
				
				if(!empty($title)){
					$created_time = $update_time = date('Y-m-d H:i:s');
					$data[] = $created_time;
					$data[] = $update_time;
					$values[] = $update_time;

					$selectColumn = [
						'title_cate',
						'created_time',
						'update_time'
					];
					$column = [
						'title_cate',
						'update_time'];

					if($id == ''){
						$insertCate = $this->categoryModel->insertCategory($selectColumn,$data);
					}
					else{
						$update = $this->categoryModel->updateCategory($column, $values, $id);
						echo '<script>
							 var do_alert = setTimeout(function(){
							        alert("Sửa thành công");
							    }, 2000);
							    clearTimeout(do_alert);
							</script>';
					}
					
					header("Location: category");
				}
				else{
					echo "<div class='alert alert-warning container' role='alert'>Thêm thất bại!</div>";
				}
			}
			else{
				if(isset($_GET['id'])){
					$id = $this->getGet('id');
					$item = $this->categoryModel->selectCategoryById($id);
					
					$this->includeView('layout.admin_header');
					$this->includeView('layout.nav');
					return $this->loadView('front.categories.add',[
						'item' => $item
					]);
				}
			}
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			return $this->loadView('front.categories.add');
		}
		else{
			header("Location: login");
			die();
		}
	}

	public function delete(){
		$id = '';
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$id = $this->getPost('id');
			$deleteByID = $this->categoryModel->deleteCategoryById($id);
		}
		else{
			header("Location: login");
			die();
		}
	}
}