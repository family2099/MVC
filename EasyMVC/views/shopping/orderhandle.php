<?php
header("content-type: text/html; charset=utf-8");

session_start();




?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<!---PS:其他js檔都要放JQUERY後面要不其他js檔先執行會錯誤--->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/EasyMVC/views/shopping/js/jquery.js"></script>
	<link href="/EasyMVC/views/shopping/css/bootstrap.min.css" rel="stylesheet">
	<link href="/EasyMVC/views/shopping/css/self.css" rel="stylesheet">
	
	<!--出現問題Mixed Content: The page at 'https://lab-coolmancz.c9users.io/shopping/' was loaded over HTTPS, but requested an insecure stylesheet 'http://fonts.googleapis.com/css?family=Roboto'. This request has been blocked; the content must be served over HTTPS.
	解決方法Edit your theme replacing every occurency of http://fonts.googleapis.com/... with https://fonts.googleapis.com/... (mind the s).

	Resources that might pose a security risk (such as scripts and fonts) must be loaded through a secure connection when requested in the context of a secured page for an obvious reason: they could have been manipulated along the way-->
	<link href="/EasyMVC/views/shopping/css/login.css" rel="stylesheet">
	<script src="/EasyMVC/views/shopping/js/bootstrap.min.js"></script>
	
	
</head>

<body>

<?php require_once('nav.php'); ?>
<div class="container-fluid dis_top">
    
    
    <div class="row">
		<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">
			<div class="panel panel-danger">
			  <div class="panel-heading">
			    <h3 class="panel-title">購物清單</h3>
			  </div>
			  <div class="panel-body">
					<div class="row">
						
							<table class="table table-striped">
								<thead>
							      <tr>
							      	<center>
							         <th>訂單編號</th>
							         <th>總價格</th>
							         <th>付款方式</th>
							         <th>日期</th>
							         <th>刪除</th>
							        </center> 
							      </tr>
							   	</thead>
								<?php 
									
		 								if(isset($data[0]))
										{	
		 									for($i=0;$i<$data[0];$i++)
											{
												
												
		 						?>
		 										<!--//表單問題讓他每次FORM一組,就可以傳不同的值-->
												<form action="/EasyMVC/member_center/delete_order" method="post">
					 							
								 				<tr>
								 					<td><a href="/EasyMVC/member_center/order_list/<?php echo $data[1][$i]['order_index']; ?>"><?php echo $data[1][$i]['order_index']; ?></a></td>
								 					<td><?php echo $data[1][$i]['order_price']?></td>
								 					<td><?php echo $data[1][$i]['payment']?></td>
								 					<td><?php echo $data[1][$i]['order_date']?></td>
								 					<input name="order_index" id="order_index" type="hidden" value="<?php echo $data[1][$i]['order_index']; ?>" />
								 					<td><input type="submit" value="刪除"  /></td>
								 				</tr>
								 							
								 				</form>				
								 					
											
				    		
					    		<?php			
					 						}	
										}	
				 				?>		
				    		
				    		</table>
				    		
				    	
			    	</div>
			  </div>
			</div>
		</div>
	</div>

</div>








</body>

</html>






