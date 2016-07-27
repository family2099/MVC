<?php

  session_start();


//-------------------------------
// 清除所有SESSION資料
//-------------------------------
	// 使用者的名稱
	$_SESSION['username'] = NULL;
	unset($_SESSION['username']);
	// 使用者的等級
	$_SESSION['usergroup'] = NULL;
	unset($_SESSION['usergroup']);
	//當登入前的前一瀏覽頁面
	
	//清除判斷是否第一次登入
	unset($_SESSION['decidelogincount']);

	$_SESSION['item']['item_index'] = NULL;
	unset($_SESSION['item']['item_index']);
	// 商品的名稱
	$_SESSION['item']['item_name'] = NULL;
	unset($_SESSION['item']['item_name']);
	// 商品的單價
	$_SESSION['item']['price'] = NULL;
	unset($_SESSION['item']['price']);
	// 商品的數量
	$_SESSION['item']['quantity'] = NULL;
	unset($_SESSION['item']['quantity']);
	// 商品的總價
	$_SESSION['item']['total_price'] = NULL;
	unset($_SESSION['item']['total_price']);
	// 訂單編號
	$_SESSION['item']['order_index'] = NULL;
	unset($_SESSION['item']['order_index']);

	header("Location: /EasyMVC/Index/get_Index/0");
?>