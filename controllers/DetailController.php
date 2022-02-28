<?php 
class DetailController extends BaseController{

	public function __construct(){
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel();
		$this->loadModel('CategoryModel');
		$this->categoryModel = new CategoryModel();
		$this->loadModel('AccountModel');
		$this->accountModel = new AccountModel();
		$this->loadModel('StockModel');
		$this->stockModel = new StockModel();
	}
	public function index(){
		$columnProduct = ['id_product',
					'tenSanPham',
					'thumnail',
					'price',
					'discount',
					'id_category',
					'moTaSanPham'];
		$columnCategory = ['id_category', 'title_cate'];
		$product = $this->productModel->selectProductJoin($columnProduct, $columnCategory, 'id_category');
		$this->includeView('layout.home_header');
		$this->loadView('front.details.detailIndex',[
			'product' => $product
		]);
		$this->includeView('layout.home_footer');
	}
	public function portfolio(){
		$columnProduct = ['id_product',
					'tenSanPham',
					'thumnail',
					'price',
					'discount',
					'id_category',
					'moTaSanPham'];
		$columnCategory = ['id_category', 'title_cate'];
		if(isset($_GET['product'])){
			$productName = $_GET['product'];
		}
		$alldata = $this->categoryModel->selectAllCategory();
		$productPort = $this->productModel->selectAllProductByName($columnProduct, $columnCategory, 
			'id_category','title_cate' ,$productName);
		
		$this->includeView('layout.home_header');
		$this->loadView('front.details.portfolio',[
			'productPort' => $productPort,
			'productName' => $productName,
			'alldata' => $alldata
		]);
		$this->includeView('layout.home_footer');
	}

	public function show(){
		$columnProduct = ['id_product',
					'tenSanPham',
					'thumnail',
					'price',
					'discount',
					'id_category',
					'moTaSanPham'];
		$columnCategory = ['id_category', 'title_cate'];
		if(!empty($_GET)){
			$id = $this->getGet('id');
			$productDetail = $this->productModel->selectProductJoinById($columnProduct, $columnCategory, 'id_category','id_product', $id);
			$importStock = $this->stockModel->sumStock('amount' ,'id_product', $id, 'action', 'Nhập hàng');
			$exportStock = $this->stockModel->sumStock('amount' ,'id_product', $id, 'action', 'Xuất hàng');
			$totalInStock = $importStock['total'] - $exportStock['total'];
			$stock = $this->stockModel->selectStockAllById('id_product', $id);
		}
		$this->includeView('layout.home_header');
		$this->loadView('front.details.detail',[
			'totalInStock' => $totalInStock,
			'productDetail' => $productDetail,
			'stock' => $stock
		]);
		$this->includeView('layout.home_footer');
	}
	public function unknown(){

	}
}