<?php

class RegisterController extends BaseController
{
	private $accountModel;

	public function __construct(){
		$this->loadModel('AccountModel');
		$this->accountModel = new AccountModel();
	}
	public function index()
	{
		//
		//$register = $this->registerModel->selectAllRegister();
		return $this->loadView('front.register.signup');
	}
	public function signup(){
		
		$data = [];
		if (!empty($_POST)){

			$fullname = $this->getPost('fullname');
			$data[] = $fullname;
			
			$dob = $this->getPost('dob');
			$data[] = $dob;
			
			$email = $this->getPost('email');
			$data[] = $email;

			$username = $this->getPost('username');
			$data[] = $username;

			$password = $this->getPost('password');
			$password = md5($password);
			$data[] = $password;

			$confirmPassword = $this->getPost('confirmPassword');
			$confirmPassword = $confirmPassword;
			$confirmPassword = md5($confirmPassword);
			
			$phone = $this->getPost('phone');
			$data[] = $phone;

			$address = $this->getPost('address');
			$data[] = $address;

			$create_time = $update_time = date('Y-m-d H:i:s');
			$data[] = $create_time;
			$data[] = $update_time;
			$columnAccount = [
				'hoTen',
				'dob',
				'email',
				'userName',
				'passWord',
				'soDienThoai',
				'diaChi',
				'created_time',
				'update_time'
				];
			if(!empty($fullname) && !empty($username) && !empty($email) && !empty($password) && ($password == $confirmPassword)){
				
				$account = $this->accountModel->insertAccount($columnAccount, $data);
					
				header("Location: login");
			}
			else{
				echo "<div class='alert alert-warning container ' role='alert'>Đăng ký thất bại!</div>";
			}
		}
		return $this->loadView('front.register.signup');
	}

	public function edit(){
		
		if(!empty($_SESSION['username'])){
			if(isset($_COOKIE[md5('id')])){
				$id_account = $_COOKIE[md5('id')];
			}
			$accountRole=$this->accountModel->selectAllAccountRole('id_account', $id_account);

			$account = $this->accountModel->selectAccountById($id_account);
			$this->loadView('front.register.edit', [
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
				}
				else{
					echo "<div class='alert alert-warning container' role='alert'>Sửa thất bại!</div>";
				}
			}
		}
		else{
			$this->includeView('front.login.login_required');
		}
	}
}