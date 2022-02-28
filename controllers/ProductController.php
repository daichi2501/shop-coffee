<?php

class ProductController extends BaseController
{
	const LIMIT = 5;
	private $table;
	private $productModel;

	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel();
		$this->loadModel('CategoryModel');
		$this->categoryModel = new CategoryModel();
	}
	public function index()
	{
		$columnProduct = ['id_product',
					'tenSanPham',
					'thumnail',
					'price',
					'discount',
					'id_category',
					'moTaSanPham'];
		$columnCategory = ['id_category', 'title_cate'];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$product = $this->productModel->selectProductJoin($columnProduct, $columnCategory, 'id_category');

			$count = count($product);
			$number = ceil($count/self::LIMIT);

			$page = $this->getGet('page');
			if($page>$number || $page<0 || empty($_GET['page'])){
				$page = 1;
			}
			$firstIndex = ($page-1)*self::LIMIT;

			$product = $this->productModel->selectProductJoinPaging($columnProduct, $columnCategory, 'id_category', self::LIMIT, $page);

			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.products.index',[
				'product' => $product,
				'firstIndex' => $firstIndex
			]);
			$this->includeView('layout.pagination',[
				'page' => $page,
				'number' => $number
			]);
			$this->includeView('layout.scriptDelete', [
				'controllerName' => $this->table = 'product'
			]);
			$this->includeView('layout.searchFilter');
		}
		
		else{
			header("Location: login");
			die();
		}
	}
	public function add(){
		
		$data = [];
		$values = [];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			if(!empty($_POST)){
				$tenSanPham = $this->getPost('tenSanPham');
				$data[] = $tenSanPham;
				$values[] = $tenSanPham;

				$thumnail = $this->getPost('thumnail');
				$data[] = $thumnail;
				$values[] = $thumnail;

				$id = $this->getPost('id');
			
				$price = $this->getPost('price');
				$data[] = $price;
				$values[] = $price;

				$id_category = $this->getPost('id_category');
				$data[] = $id_category;
				$values[] = $id_category;

				$discount = $this->getPost('discount');
				$data[] = $discount;
				$values[] = $discount;

				$created_time = $update_time = date('Y-m-d H:i:s');
				$data[] = $created_time;
				$data[] = $update_time;
				$values[] = $update_time;

				$describe = $this->getPost('describe');
				$data[] = $describe;
				$values[] = $describe;
				
				$columnProduct = [
						'tenSanPham',
						'thumnail',
						'price',
						'id_category',
						'discount',
						'created_time',
						'update_time',
						'moTaSanPham'];
				$columnUpdate = ['tenSanPham',
						'thumnail',
						'price',
						'id_category',
						'discount',
						'update_time',
						'moTaSanPham'];

				if(!empty($tenSanPham) && !empty($thumnail) && !empty($price) && !empty($id_category)){
					if($id == ''){
						$product = $this->productModel->insertProduct($columnProduct, $data);
						//echo $id;
					}
					else{
						$product = $this->productModel->updateProduct($columnUpdate, $values, $id);
					}
					header("Location: product");
				}
				else{
					echo "<div class='alert alert-warning container ' role='alert'>Thêm thất bại!</div>";
				}
			}
			else{
				if(isset($_GET['id'])){
					$id = $this->getGet('id');

					$item = $this->productModel->selectProductById($id);
					$cate = $this->categoryModel->selectAllCategory();
					//print_r($item);
					$this->includeView('layout.admin_header');
					$this->includeView('layout.nav');
					return $this->loadView('front.products.add',[
						'item' => $item,
						'cate'=>$cate
					]);
				}
			}

			$cate = $this->categoryModel->selectAllCategory();
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			return $this->loadView('front.products.add',[
				'cate'=>$cate
			]);
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
			$deleteByID = $this->productModel->deleteProductById($id);
		}
		
		else{
			header("Location: login");
			die();
		}
	}
	public function show(){
		echo __METHOD__;
	}
}