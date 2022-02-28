<?php

class HomeController extends BaseController
{
	private $productModel;

	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel();
		$this->loadModel('CategoryModel');
		$this->categoryModel = new CategoryModel();
		$this->loadModel('AccountModel');
		$this->accountModel = new AccountModel();
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
		$productDA = $this->productModel->selectAllProductByName($columnProduct, $columnCategory, 
			'id_category','title_cate' ,'Đồ ăn');
		$productDU = $this->productModel->selectAllProductByName($columnProduct, $columnCategory, 
			'id_category','title_cate' ,'Đồ uống');
		$this->includeView('layout.home_header');
		if(!empty($_GET['search'])){
			$key = $this->getGet('search');
			$search = $this->productModel->selectAllProductByName($columnProduct, $columnCategory, 
			'id_category','title_cate' ,$key);
			$search = $this->productModel->selectAllProductByName($columnProduct, $columnCategory, 
			'id_category','tenSanPham' ,$key);
			
			$this->loadView('front.home.search',[
				'search' => $search
			]);
		}
		else{
			$this->loadView('front.home.index',[
				'productDA' => $productDA,
				'productDU' => $productDU
			]);
		}
		
		$this->includeView('layout.home_footer');
	}
	public function preparation(){
		$this->includeView('layout.home_header');
		$this->loadView('front.home.preparation');
		$this->loadView('layout.home_footer');
}
	
	public function regulations(){
		$this->includeView('layout.home_header');
		$this->loadView('front.home.regulations');
		$this->loadView('layout.home_footer');
}
	public function foodsafety(){
		$this->includeView('layout.home_header');
		$this->loadView('front.home.foodsafety');
		$this->loadView('layout.home_footer');
	}
	public function refund(){
		$this->includeView('layout.home_header');
		$this->loadView('front.home.refund');
		$this->loadView('layout.home_footer');
	}
	public function security(){
		$this->includeView('layout.home_header');
		$this->loadView('front.home.security');
		$this->includeView('layout.home_footer');
	}
	public function profile(){
		$this->includeView('layout.home_header');
		
		if(!empty($_SESSION['username'])){
			if(isset($_COOKIE[md5('id')])){
				$id_account = $_COOKIE[md5('id')];
			}
			$accountRole=$this->accountModel->selectAllAccountRole('id_account', $id_account);

			$account = $this->accountModel->selectAccountById($id_account);
			$this->loadView('front.home.profile', [
				'account' => $account,
				'accountRole' => $accountRole
			]);

			$data = [];
			if (!empty($_POST)){

				$fullname = $this->getPost('fullname');
				$data[] = $fullname;
				
				$dob = $this->getPost('dob');
				$data[] = $dob;
				
				$email = $this->getPost('email');
				$data[] = $email;
				
				$phone = $this->getPost('phone');
				$data[] = $phone;

				$address = $this->getPost('address');
				$data[] = $address;

				$update_time = date('Y-m-d H:i:s');
				$data[] = $update_time;
				$columnAccount = [
					'hoTen',
					'dob',
					'email',
					'soDienThoai',
					'diaChi',
					'update_time'
					];
				if(!empty($fullname) && !empty($email)){
					
					$account = $this->accountModel->updateAccount($columnAccount, $data, $id_account);
					print_r($account);
				}
				else{
					echo "<div class='alert alert-warning container' role='alert'>Sửa thất bại!</div>";
				}
			}
		}
		else{
			$this->includeView('front.login.login_required');
		}
		$this->includeView('layout.home_footer');
	}
	public function search(){
		echo __METHOD__;
	}
}