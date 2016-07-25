		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/EasyMVC/Index/get_Index/0">XX購物網</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="/EasyMVC/Index/get_member_center">會員中心</a></li>
				<li><a href="/EasyMVC/Index/get_order_step01"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 購物車</a></li>
				<?php if(!isset($_SESSION["username"])){ 
					
				?>
					<!--<script>alert("請重新登入");</script>-->
					<li><a data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> 登入</a></li>
				<?php } 
					  else{
					  		if(isset($_SESSION['decidelogincount'])){
					  			
					  		
				?>			
								<script>alert("歡迎登入本購物網站");</script>
							<?php 
							
								$_SESSION['decidelogincount']=null;
							
							}?>	
						<li><a href="/EasyMVC/Index/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 登出</a></li>
					
				<?php } ?>
				
			  </ul>
			  
			</div>
		  </div>
		</nav>
		<!--要加已登入說明-->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  	<div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>登入您的帳號</h1><br>
					<form action="/EasyMVC/Index/get_login_data" method="post">
						<input type="text" name="userN" id="username" pattern="[A-Za-z0-9]{3,20}" required="true" placeholder="Username" />
						<input type="password" name="passW" id="password" pattern="[A-Za-z0-9]{3,20}" required="true" placeholder="Password" />
						<input type="submit" name="login" class="login loginmodal-submit" value="Login" >
					</form>
					<div class="login-help">
						<a href="#" class="btn btn-info btn-lg" role="button">加入會員</a> 
						<a href="#" class="btn btn-success btn-lg" role="button">忘記密碼</a>
				  	</div>
				  	
				</div>
			</div>
		</div>