<!DOCTYPE HTML>
<html>
<head>
	<title>企劃組後端登入系統</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compa]ble" content="IE=edge">	
	<meta name="viewport" content="width=device-width,initial-scale=1">	
	<!-- bootstrap -->

	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />

	<noscript>
		<!-- style -->
		<link rel="stylesheet" href="css/style.css" />
	</noscript>

	<?php
		session_start();
		//使用cookie紀錄資料
		if(isset($_POST["rememberMe"])){
			setcookie("remAccount",$_POST["inputAccount"],time()+3*24*60);
			setcookie("remPassword",$_POST["inputPassword"],time()+3*24*60);
			if(isset($_COOKIE["remAccount"])){
				setcookie("remAccount",$_POST["inputAccount"],time()-100);
				setcookie("remPassword",$_POST["inputPassword"],time()-100);
			}
		}
		// 驗證帳號密碼
		if(isset($_POST["inputPassword"])&&isset($_POST["inputAccount"])){
			$password = $_POST["inputPassword"];
			$account = $_POST["inputAccount"];
			// 輸入正確
			if($account == '123' && $password == '123'){
			    setcookie("login",'USER', time()+3600);
			    header("Location: admin.php"); 
			} 
			// 輸入錯誤
			else{
				// 正確帳號 錯誤密碼
				if($account == "123" && $password != '123'){
					$_SESSION['error'] = "Wrong_Password";
				}
				// 錯誤帳號 正確密碼
				else if($account != "123" && $password == '123'){
					$_SESSION['error'] = "Wrong_Account";
				}
				else{
					$_SESSION['error'] = "Wrong_Both";
				}
			}
		}
	?>
</head>
<body class="loginPage">
	<!-- 錯誤資訊 -->
	<?php if(isset($_SESSION['error'])): ?>
		<div class="alert alert-danger alert-dismissable text-center">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    錯誤：
		    <?php
		    switch($_SESSION['error']){
		        case 'Wrong_Both':	echo "登入失敗";    break;
		        case 'Wrong_Account':	echo "使用者帳號錯誤";    break;
		        case 'Wrong_Password':	echo "使用者密碼錯誤";    break;
		    }
		    unset($_SESSION['error']);
		    ?>
		</div>
	<?php endif ?>

	<div class="jumbotron">
		<div class="row">
			<div class="col-md-8 col-md-push-2">

		  		<h1 class="title ">企劃組管理介面登入系統</h1>

		  		<!-- 登入表單 -->
				<form class="form-horizontal form_login" role="form" method="post" action="">
					<!-- 帳號欄位 -->
				    <div class="form-group">
				    	<label for="inputAccount" class="col-sm-2 control-label">帳號</label>
					    <div class="col-sm-10">
					    	<input type="account" class="form-control" id="inputAccount" name="inputAccount" placeholder="請輸入帳號" value="<?php if(isset($_COOKIE["remAccount"])){echo $_COOKIE["remAccount"];} ?>">
					    </div>
				  	</div>
				  	<!-- 密碼欄位 -->
				  	<div class="form-group">
				    	<label for="inputPassword" class="col-sm-2 control-label">密碼</label>
				    	<div class="col-sm-10">
				      		<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="請輸入密碼" value="<?php if(isset($_COOKIE["remPassword"])){echo $_COOKIE["remPassword"];} ?>">
				   	 	</div>
				  	</div>
				  	<!-- 記住我 -->
				  	<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<div class="checkbox">
						        <label>
						          <input type="checkbox" id="rememberMe" name="rememberMe"> 記住我
						        </label>
				      		</div>
				    	</div>
				  	</div>
				  	<!-- 登入 -->
				  	<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      	<button type="submit" class="btn btn-default">登入</button>
					    </div>
				  	</div>
				</form>

			</div>
		</div>
	</div>

<!-- Footer -->
	<footer id="footer">
		<p>Copyright  &copy;  2016 |研發處企劃組. Designed by Jarvis & Ryan.</p>
	</footer>
	

	<!-- bootstrap js -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/bootstrap.js"></script>
		
</body>
</html>