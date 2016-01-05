<?php 
session_start();
require_once "../backend/model/Frontend.php";
$model = new Fontend;
$action = $_POST['action'];

if($action=='register'){
	$arrReturn = array();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$email = $_POST['email'];
	$full_name = $_POST['full_name'];
	$address = $_POST['address'];
	$city = (int) $_POST['city'];
	$phone = $_POST['phone'];
	$handphone = $_POST['handphone'];


	if($username !='' && $password !='' && $password == $password2  && $email !='' && $full_name !='' 
		&& $address!='' && $city > 0 ){
		if($model->checkUsernameExist($username)=="0"){
			echo "Tên đăng nhập đã được sử dụng.";
			exit();
		}
		if($model->checkEmailUsed($email)=="0"){
			echo "Email đã được sử dụng.";
			exit();
		}
		$password = md5($password);
		$user_id = $model->insertUser($username,$password,$email,$full_name,$address,$city,$phone,$handphone);
		echo "Đăng ký thành viên thành công.";
		$_SESSION['user'] = $model->getDetailUser($user_id);		
		exit();
	}
}
if($action=='info'){
	$arrReturn = array();
	
	$email = $_POST['email'];
	$full_name = $_POST['full_name'];
	$address = $_POST['address'];
	$city = (int) $_POST['city'];
	$phone = $_POST['phone'];
	$handphone = $_POST['handphone'];


	if($email !='' && $full_name !='' && $address!='' && $city > 0 && $handphone!=''){		
		if($model->checkEmailUsed($email,'info')=="0"){
			echo "Email đã được sử dụng.";
			exit();
		}	
		$model->updateUser($email,$full_name,$address,$city,$phone,$handphone);
		echo "ok";
		$user_id = $_SESSION['user']['id'];
		$_SESSION['user'] = $model->getDetailUser($user_id);		
		exit();
	}
}
if($action == "login"){
	$username = $_POST['username_login'];
	$password = $_POST['password_login'];
	$model->login($username,$password);
}
if($action == "changepass"){
	$old_pass = $model->processData($_POST['old_pass']);
	$password = $model->processData($_POST['password']);
	$password2 = $model->processData($_POST['password2']);
	$old_pass = md5($old_pass);
	$user_id = $_SESSION['user']['id'];
	if($model->checkOldPass($old_pass,$user_id)==true){
		if($password == $password2){
			$password = md5($password);			
			$model->changePass($password,$user_id);
			session_destroy();
			echo "ok";
		}
	}else{
		echo "errorpass";
	}
	exit();
	
}
if($action =='checkUserName'){
	$username = $model->processData($_POST['username']);
	echo $result = $model->checkUsernameExist($username);
}
if($action =='checkEmail'){
	$email = $model->processData($_POST['email']);
	echo $result = $model->checkEmailUsed($email);
}