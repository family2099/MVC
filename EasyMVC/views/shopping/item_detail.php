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
	<script src="/EasyMVC/views/shopping/js/getindex.js"></script>
	<script src="/EasyMVC/views/shopping/js/cardata.js"></script>
	<link href="/EasyMVC/views/shopping/css/item_detail.css" rel="stylesheet">





</head>

<body>


	<?php require_once('nav.php'); ?>

	<div class="container-fluid dis_top">

		<div class="row">

			

			<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
				<table class="item_detail_style1">
					<tr>
						<td class="item_detail_style2">
							<table class="item_detail_style1">
								<tr>
									<td class="item_detail_style3">
										<?php echo $data['title']; ?>
									</td>
								</tr>
							</table>
							<table class="item_detail_style4">
								<tr>
									<td class="item_detail_style5">
										<img src="<?php echo '/EasyMVC/views/shopping/photo/item/'.$data['photo']; ?>" width="108" />
										<br /><br />


									</td>
									<td class="item_detail_style6">
										<table class="item_detail_style1">
											<tr>
												<td class="item_detail_style7">
													編號
												</td>
												<td class="item_detail_style8">
													<?php echo $data['item_index']; ?>
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													作者
												</td>
												<td class="item_detail_style8">
													<?php echo $data['author']; ?>
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													翻譯
												</td>
												<td class="item_detail_style8">
													<?php echo $data['translator']; ?>
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													出版商
												</td>
												<td class="item_detail_style8">
													<?php echo $data['publisher']; ?>
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													初版日
												</td>
												<td class="item_detail_style8">
													<?php echo date("Y年n月", strtotime($data['publishdate'])); ?>
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													類別
												</td>
												<td class="item_detail_style8">
													<?php echo $data['category']; ?> 
													<?php echo $data['category_type']; ?>
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													定價
												</td>
												<td class="item_detail_style8">
													<?php echo $data['price']; ?> 元
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													線上價
												</td>
												<td class="item_detail_style8">
													<span class="item_detail_style10">
													<?php echo $data['discount']; ?>
				                  		  </span> 折
													<span class="item_detail_style10">
													<?php echo $data['saleprice']; ?>
						                  </span> 元
												</td>
											</tr>
											<tr>
												<td class="item_detail_style7">
													備註
												</td>
												<td class="item_detail_style8">
													<?php if ($data['cd']==1) { echo '本產品附光碟'; } ?>
												</td>
											</tr>
										</table>
									</td>
									<td class="item_detail_style6">
										<br>
										<a href="/EasyMVC/Index/add_to_cart/<?php echo $data['id']; ?>" class="btn btn-info btn-lg cardata" role="button">加入購物車</a>


										<br>
										<br>
									

									</td>
								</tr>
							</table>
							<?php 
						      if (isset($data['contents'])) 
						      { 
						    ?>
							<table class="item_detail_style13">
								<tr>
									<td class="item_detail_style11">
										目<br />錄
									</td>
									<td class="item_detail_style12">
										<?php echo nl2br($data['contents']); ?>
									</td>
								</tr>
							</table>
							<?php 
								  } 
								  if (isset($data['feature'])) 
									{ 
							  ?>
							<table class="item_detail_style13">
								<tr>
									<td class="item_detail_style11">
										特<br />色
									</td>
									<td class="item_detail_style12">
										<?php echo nl2br($data['feature']); ?>
									</td>
								</tr>
							</table>
							<?php 
								  } 
								?>
							<table class="item_detail_style13">
								<tr>
									<td class="item_detail_style11">
										光<br />碟<br />內<br />容
									</td>
									<td class="item_detail_style12">
										範例檔案
									</td>
								</tr>
							</table>
							<table class="item_detail_style13">
								<tr>
									<td class="item_detail_style11">
										備<br />註
									</td>
									<td class="item_detail_style12">
										<?php if ($data['color']==1) { echo '彩色書'; } ?>
									</td>
								</tr>
							</table>
						</td>




					</tr>
				</table>




			</div>
		</div>
	</div>




</body>

</html>
