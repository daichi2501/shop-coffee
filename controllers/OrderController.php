<?php
class OrderController extends BaseController{
	const LIMIT = 6;
	private $table;
	public function __construct(){
		$this->loadModel('AccountModel');
		$this->accountModel = new AccountModel();
		$this->loadModel('OrderModel');
		$this->orderModel = new OrderModel();
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel();
		$this->loadModel('StockModel');
		$this->stockModel = new StockModel();
	}
	public function index(){
		$columnOrderAccount = [
			'id_order_account',
			'id_account',
			'order_date',
			'recipient_name',
			'phone',
			'receiver_address',
			'note'
		];
		$columnAccount = [
			'id_account',
			'hoTen',
			'userName',
			'soDienThoai',
			'diaChi'
		];
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$allorder = $this->orderModel->selectAllOrderAccount();
			$count = count($allorder);
			$number = ceil($count/self::LIMIT);

			$page = $this->getGet('page');
			if($page>$number || $page<0 || empty($_GET['page'])){
				$page = 1;
			}
			$firstIndex = ($page-1)*self::LIMIT;
			
			$paging = $this->orderModel->pagingOrder($columnOrderAccount, $columnAccount, 'id_account', self::LIMIT, $page);
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.orders.index',[
				'paging' => $paging,
				'firstIndex' => $firstIndex
			]);
			$this->includeView('layout.pagination',[
				'page' => $page,
				'number' => $number
			]);

			$this->includeView('layout.scriptDelete', [
				'controllerName' => $this->table = 'order'
			]);
			$this->includeView('layout.searchFilter');
		}
		else{
			header("Location: login");
			die();
		}
	}
	public function detail(){
		$columnOrderDetail = [
			'id_order_detail',
			'id_order_account',
			'id_product',
			'amount'
		];
		$columnProduct = [
			'id_product',
			'tenSanPham',
			'thumnail',
			'price',
			'discount',
			'id_category',
			'moTaSanPham'];
		if(!empty($_GET)){
			$id = $this->getGet('id');
		}
		$order_detail = $this->orderModel->selectAllOrderDetailById($columnOrderDetail, $columnProduct, 'id_product', 'id_order_account', $id);

		// print_r($order_detail);
		$this->includeView('layout.admin_header');
		$this->includeView('layout.nav');
		$this->loadView('front.orders.detail',[
			'order_detail' => $order_detail
		]);
		$this->includeView('layout.scriptDelete', [
			'controllerName' => $this->table = 'order'
		]);
		$this->includeView('layout.searchFilter');
	}
	public function add(){
		if(!empty($_POST)){
			$amountProduct = $this->getPost('amountProduct');
			$amountProduct = intval($amountProduct);
		}
		else{
			$amountProduct = 1;
		}
		$cart = [];
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
		}
		$id = $this->getPost('id');
		$importStock = $this->stockModel->sumStock('amount' ,'id_product', $id, 'action', 'Nhập hàng');
		$exportStock = $this->stockModel->sumStock('amount' ,'id_product', $id, 'action', 'Xuất hàng');
		if($importStock['total']-$exportStock['total'] > 0){
			$isFind = false;
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['id_product'] == $id){
					$cart[$i]['amount'] ++;
					$isFind = true;
					break;
				}
			}
			
			if(!$isFind){
				$productAdd = $this->productModel->selectProductById($id);

				$productAdd['amount'] += 1;
				$cart[] = $productAdd;
			}
		}
		else{
			echo '<script type="text/javascript">
				alert("Hết hàng!");
			</script>';
			
		}
		//echo ($importStock['total']-$exportStock['total']);
		$_SESSION['cart'] = $cart;
	}

	public function purchare(){
		$this->includeView('layout.home_header');

		if(isset($_SESSION['username'])){
			$id_account = '';
			if(isset($_COOKIE[md5('id')])){
				$id_account = $_COOKIE[md5('id')];
			}
			$accountRole=$this->accountModel->selectAllAccountRole('id_account', $id_account);
			$account = $this->accountModel->selectAccountById($id_account);
			
			$this->loadView('front.orders.purchare',[
				'account' => $account,
				'accountRole' => $accountRole
			]);
		}
		else{
			$this->includeView('front.login.login_required');
		}
		$this->loadView('layout.home_footer');
	}
	public function delete(){
		$id = '';
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$id = $this->getPost('id');
			$deleteByID = $this->categoryModel->deleteOrderById($id);
		}
		else{
			header("Location: login");
			die();
		}
	}
	public function deleteFrontEnd(){
		$cart = [];
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
		}
		$id = $this->getPost('id');

		for ($i=0; $i < count($cart); $i++) { 
			if($cart[$i]['id_product'] == $id){
				array_splice($cart, $i, 1);
				break;
			}
		}
		$_SESSION['cart'] = $cart;
	}

	public function cart(){
		$columnAccount = [
			'id_account',
			'userName',
			'soDienThoai',
			'diaChi'
		];
		$columnOrder = [
			'id_product',
			'id_account',
			'amount_order'
		];
		$columnProduct = [
			'id_product',
			'tenSanPham',
			'thumnail',
			'price',
			'discount'
		];
		if(!empty($_COOKIE())){
			$id_account = $_COOKIE(md5('id'));
			$cartOrder = $this->orderModel->selectOrderTripleJoinById($columnOrder, $columnProduct, $columnOrder, 'id_product', 'id_account', $id_account);
		}
		$cart[] = $cartOrder;
		$_SESSION['cart'] = $cart;
	}

	public function checkout(){
		$data = [];
		$note = '';

		$cart = [];
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
		}
		if($cart == null || count($cart)==0){
			header ("Location: detail");
		}
		$this->includeView('layout.home_header');
		
		if(isset($_COOKIE[md5('id')])){
			$id_account = $_COOKIE[md5('id')];
			$data[] = $id_account;
			$date = date('Y-m-d H:i:s');
			$data[] = $date;
		}
		if(!empty($_POST)){
			$recipient_name = $this->getPost('recipient_name');
			$data[] = $recipient_name;

			$phone = $this->getPost('phone');
			$data[] = $phone;

			$receiver_address = $this->getPost('receiver_address');
			$data[] = $receiver_address;

			$note = $this->getPost('note');
			$data[] = $note;
		}
		
		$columnOrderAccount = [
			'id_account',
			'order_date',
			'recipient_name',
			'phone',
			'receiver_address',
			'note'
		];
		$columnOrderDetail = [
			'id_order_account',
			'id_product',
			'amount'
		];
		$insertOrder_account = $this->orderModel->insertOrderAccount($columnOrderAccount, $data);
		print_r($insertOrder_account);

		$order_account = $this->orderModel->selectOrderById('id_account', $id_account);
		$order_account = $order_account['id_order_account'];

		foreach($cart as $item){
			$values = [];
			$values[] = $order_account;
			$values[] = $item['id_product'];
			$values[] = $item['amount'];

			$insertOrder_detail = $this->orderModel->insertOrderDetail($columnOrderDetail, $values);
		}
		$this->includeView('layout.home_footer');
	}
	public function shipment(){
		$data = [];
		$cart = [];

		$columnOrderAccount = [
			'id_account',
			'order_date',
			'recipient_name',
			'phone',
			'receiver_address',
			'note'
		];
		$columnOrderDetail = [
			'id_order_account',
			'id_product',
			'amount'
		];
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
		}
		if($cart == null || count($cart)==0){
			header ("Location: detail");
		}
		
		
		if(isset($_COOKIE[md5('id')])){
			$id_account = $_COOKIE[md5('id')];
			$data[] = $id_account;
			$date = date('Y-m-d H:i:s');
			$data[] = $date;
		}
		if(!empty($_POST)){
			$recipient_name = $this->getPost('recipient_name');
			$data[] = $recipient_name;

			$phone = $this->getPost('phone');
			$data[] = $phone;

			$receiver_address = $this->getPost('receiver_address');
			$data[] = $receiver_address;

			$note = $this->getPost('note');
			$data[] = $note;

			$insertOrder_account = $this->orderModel->insertOrderAccount($columnOrderAccount, $data);

			$order_account = $this->orderModel->selectOrderById('id_account', $id_account);
			
			$order_account = $order_account['id_account'];
		
			

			foreach($cart as $item){
				$values = [];
				$values[] = $order_account;
				$values[] = $item['id_product'];
				$values[] = $item['amount'];

				$insertOrder_detail = $this->orderModel->insertOrderDetail($columnOrderDetail, $values);
			}
		header("Location: Home");
		die();
		}
		
		
		$this->includeView('layout.home_header');
		$this->loadView('front.orders.shipmentDetail');
		$this->includeView('layout.home_footer');
		
	}
}