<?php 
class StockController extends BaseController{
	const LIMIT = 5;
	public function __construct(){
		$this->loadModel('StockModel');
		$this->stockModel = new StockModel();
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel();
	}
	public function index(){
		$columnProduct=[
			'id_product',
			'tenSanPham'
		];
		$columnStock=[
			'id_stock',
			'id_product',
			'amount',
			'action',
			'created_time',
			'update_time',
			'report'
		];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$stock = $this->stockModel->selectAllStock();

			$count = count($stock);
			$number = ceil($count/self::LIMIT);

			$page = $this->getGet('page');
			if($page>$number || $page<0 || empty($_GET['page'])){
				$page = 1;
			}
			$firstIndex = ($page-1)*self::LIMIT;
			
			$paging = $this->stockModel->selectStockJoinPaging($columnStock, $columnProduct, 'id_product',self::LIMIT, $page);
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.stocks.index',[
				'paging' => $paging,
				'firstIndex' => $firstIndex
			]);
			$this->includeView('layout.pagination',[
				'page' => $page,
				'number' => $number
			]);

			$this->includeView('layout.scriptDelete', [
				'controllerName' => $this->table = 'stock'
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
		$id = $this->getPost('id');
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$columnStock = [
					'id_product',
					'amount', 
					'action', 
					'created_time', 
					'update_time', 
					'report'];
			$columnUpdate = ['id_product',
					'amount', 
					'action',  
					'update_time', 
					'report'];
			$columnProduct=[
				'id_product',
				'tenSanPham'
			];
			if(!empty($_POST)){
				$id = $this->getPost('id');

				$id_product = $this->getPost('id_product');
				$data[] = $id_product;
				$values[] = $id_product;

				$amount = $this->getPost('amount');
				$data[] = $amount;
				$values[] = $amount;
				
				$action_stock = $this->getPost('action_stock');
				$data[] = $action_stock;
				$values[] = $action_stock;

				$created_time = $update_time = date('Y-m-d H:i:s');
				$data[] = $created_time;
				$data[] = $update_time;
				$values[] = $update_time;

				$report = $this->getPost('report');
				$data[] = $report;
				$values[] = $report;

				if($id == ''){
					$insert = $this->stockModel->insertStock($columnStock, $data);
				}
				else{
					$update = $this->stockModel->updateStock($columnUpdate, $values, $id);
				}
				header("Location: stock");
			}
			else{
				if(isset($_GET['id'])){
					$id = $this->getGet('id');

					$item = $this->stockModel->selectStockById('id_stock', $id);
					$productAllName = $this->productModel->selectAllProduct(['id_product','tenSanPham']);
					//print_r($item);
					$this->includeView('layout.admin_header');
					$this->includeView('layout.nav');
					return $this->loadView('front.stocks.add',[
						'item' => $item,
						'productAllName'=>$productAllName
					]);
				}
			}
			
			$productAllName = $this->productModel->selectAllProduct(['id_product','tenSanPham']);
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			return $this->loadView('front.stocks.add',[
				'productAllName' => $productAllName
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
			$deleteByID = $this->stockModel->deleteStockById($id);
		}
		
		else{
			header("Location: login");
			die();
		}
	}
}