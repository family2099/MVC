<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
	<!---PS:其他js檔都要放JQUERY後面要不其他js檔先執行會錯誤--->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/EasyMVC/views/shopping/js/jquery.js"></script>
	<link href="/EasyMVC/views/shopping/css/bootstrap.min.css" rel="stylesheet">
	<link href="/EasyMVC/views/shopping/css/self.css" rel="stylesheet">
	<link href="/EasyMVC/views/shopping/css/login.css" rel="stylesheet">
	<script src="/EasyMVC/views/shopping/js/bootstrap.min.js"></script>
	
	

	
	
	
</head>

<body>

    <?php require_once('nav.php'); ?>


    <div class="container-fluid dis_top">
				
		<div class="row">
		
			<div class="page-header">
			  <center><h1>會員中心 <small>member center</small></h1></center>
			</div>
			
		</div>	
		<div class="row">
			<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>帳號管理</h2></h3>
					</div>
					<div class="panel-body">
						<div class="row">
				    		
				    			<a class="btn btn-danger btn-block" href="/MVC/EasyMVC/member_center/get_member_data" role="button">會員資料管理</a>
				    	
				    	</div>
					</div>
				</div>
			</div>
		</div>
			
	
		<div class="row">
			<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<div class="panel panel-warning">
				  <div class="panel-heading">
				    <h3 class="panel-title"><h2>訂單相關查詢</h2></h3>
				  </div>
				  <div class="panel-body">
						<div class="row">
				    		
				    			<a class="btn btn-warning btn-block" href="/MVC/EasyMVC/member_center/to_orderhandle" role="button">訂單查詢</a>
				    		
				    	</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
			
			
			
	
    
</body>

</html>
