<?php

class LoginController extends BaseController
{

	private $accountModel;

	public function __construct(){
		$this->loadModel('AccountModel');
		$this->accountModel = new AccountModel();
	}
	public function index(){
		$cart = [];
		$_SESSION['cart'] = $cart;
		$username = $password = $error = '';
		if(!empty($_POST)){
			
			$username = $this->getPost('username');
			$_SESSION['username'] = $username;

			$password = $this->getPost('password');
			$password = md5($password);

			$columnAccount=[
				'id_account',
				'userName',
				'passWord'
			];
			$columnAcc_Role=[
				'id_account',
				'id_role'
			];
			$account = $this->accountModel->checkAccount($columnAccount, $columnAcc_Role, 'id_account', $username, $password);
			
			foreach($account as $item){
				if($item['id_role']==1){
					$_SESSION['role'] = $item['id_role'];
				}
				setcookie(md5('id'), $item['id_account'], time() + 7*24*60*60, '/');
			}	
			if(count($account)>0 && $account!=null){
				setcookie('login', 'true', time() + 7*24*60*60, '/');

				header("Location: home");
				die();
			}
			else{
				echo "<div class='alert alert-warning container' role='alert'>Đăng nhập thất bại!</div>";
			}
		}
		if(isset($_SESSION['username']) && isset($_COOKIE['login'])){
			header("Location: home");
			die();
		}
		else{
			return $this->loadView('front.login.index');
		}
	}
	public function logout(){
		
		setcookie('login', 'true', time() - 7*24*60*60, '/');
		setcookie(md5('id'), $item['id_account'], time() - 7*24*60*60, '/');

		unset($_SESSION['username']);
		unset($_SESSION['role']);
		// unset($_SESSION['cart']);
		header("Location: home");
		die();
	}
	public function forgotPass(){
		
	}
	public function show(){
		echo __METHOD__;
	}
}
