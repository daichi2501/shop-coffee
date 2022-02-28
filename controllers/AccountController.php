<?php

class AccountController extends BaseController
{
	const LIMIT = 4;
	private $table;
	private $accountModel;

	public function __construct(){
		$this->loadModel('AccountModel');
		$this->accountModel = new AccountModel();
		$this->loadModel('RoleModel');
		$this->roleModel = new RoleModel();
	}
	public function index(){
		$columnAccount = [
			'id_account',
			'hoTen',
			'dob',
			'email',
			'userName',
			'passWord',
			'soDienThoai',
			'diaChi'
		];
		$columnRole = [
			'id_role',
			'name_role'
		];
		$account = $this->accountModel->selectTripleJoin(['id_account','id_role'], $columnRole, $columnAccount, 'id_role', 'id_account');

		$count = count($account);
		$number = ceil($count/self::LIMIT);

		$page = $this->getGet('page');
		if($page>$number || $page<0 || empty($_GET['page'])){
			$page = 1;
		}
		$firstIndex = ($page-1)*self::LIMIT;

		$accountPaging = $this->accountModel->selectTripleJoinPaging(['id_account','id_role'], $columnRole, $columnAccount, 'id_role', 'id_account', self::LIMIT, $page);
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.accounts.index',[
				'accountPaging' => $accountPaging,
				'firstIndex' => $firstIndex
			]);
			$this->includeView('layout.pagination',[
				'page' => $page,
				'number' => $number
			]);
			$this->includeView('layout.scriptDelete_account',[
				'controllerName' => $this->table = 'account'
			]);
			$this->includeView('layout.searchFilter');
		}
		else{
			header("Location: login");
			die();
		}
	}
	public function delete(){
		$id = '';
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			if(isset($_POST['id']) && isset($_POST['role'])){
			
				$id = $_POST['id'];
				$role = $_POST['role'];
				$delete = $this->accountModel->deleteAccountRoleById('id_role', $role, 'id_account', $id);
			}
			elseif(isset($_POST['role']) == ''){
				$id = $_POST['id'];
				$deleteByID = $this->accountModel->deleteAccountById($id);
			}
		}
		else{
			header("Location: login");
			die();
		}
	}
	public function addrole(){
		$id = $this->getGet('id');
		$get_role = $this->getGet('role');

		$data = [];
		$update = [];
		$columnAccount = [
			'id_account',
			'hoTen',
			'dob',
			'email',
			'userName',
			'passWord',
			'soDienThoai',
			'diaChi'
		];
		$columnRole = [
			'id_role',
			'name_role'
		];
		$role = $this->roleModel->selectAllRole();
		// $accountById = $this->accountModel->selectTripleJoinById(['id_account','id_role'], $columnRole, $columnAccount, 'id_role', 'id_account', $id);

		$accountById = $this->accountModel->selectAccountById($id);
		if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'true' && isset($_SESSION['role'])){
			if(!empty($_POST)){
				$id = $this->getPost('id');
				$data[] = $id;
				$update[] = $id; 

				$id_role = $this->getPost('id_role');
				$data[] = $id_role;

				$update[] = $id_role; 
				if($get_role==''){
					$insertAcc_Role = $this->accountModel->insertAccount_Role(['id_account','id_role'],$data);
				}
				else{
					$this->accountModel->updateAccount_Role('account', 'role',['id_account','id_role'],$update, $id, $get_role);
				}

				header("Location: account");
			}
		
			$this->includeView('layout.admin_header');
			$this->includeView('layout.nav');
			$this->loadView('front.accounts.addrole',[
				'accountById' => $accountById,
				'role' => $role,
				'get_role' => $get_role
			]);
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