
<?php

  session_start();
  
  date_default_timezone_set('Asia/Taipei');
  
  $_SESSION['order_index'] = NULL;

?>
<?php
//------------------------------------
// 檢查購物車內是否有商品
//------------------------------------

// 購物車內有商品
$_SESSION['has_item'] = TRUE;
// 商品的編號				
if (!isset($_SESSION['item']['item_index']) || (count($_SESSION['item']['item_index']) == 0)) {
  // 購物車內沒有商品
  $_SESSION['has_item'] = FALSE;
}

// 沒有加入商品
if (!$_SESSION['has_item']) {
  header('Location: order_step02.php');
}
?>
<?php
// 付款方式
if (!isset($_SESSION['payment'])) {
  $_SESSION['payment'] = '線上刷卡';
}

// 訂單編號
if (!isset($_SESSION['order_index'])) {

  $_SESSION['order_index'] = "DR-".$_SESSION['username']."-".date('YmdHis');
  
  
  
}
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
<link href="/EasyMVC/views/shopping/css/index.css" rel="stylesheet">
<!--出現問題Mixed Content: The page at 'https://lab-coolmancz.c9users.io/shopping/' was loaded over HTTPS, but requested an insecure stylesheet 'http://fonts.googleapis.com/css?family=Roboto'. This request has been blocked; the content must be served over HTTPS.
解決方法Edit your theme replacing every occurency of http://fonts.googleapis.com/... with https://fonts.googleapis.com/... (mind the s).

Resources that might pose a security risk (such as scripts and fonts) must be loaded through a secure connection when requested in the context of a secured page for an obvious reason: they could have been manipulated along the way-->
<link href="/EasyMVC/views/shopping/css/login.css" rel="stylesheet">
<script type="text/javascript" src="/EasyMVC/views/shopping/js/getindex.js"></script>
<script src="/EasyMVC/views/shopping/js/bootstrap.min.js"></script>
<script src="/EasyMVC/views/shopping/js/login_form.js"></script>
<link href="/EasyMVC/views/shopping/css/order_step01.css" rel="stylesheet" type="text/css" />

<script src="/EasyMVC/views/shopping/js/order_step02.js" type="text/javascript"></script>

<link href="/EasyMVC/views/shopping/css/order_step03.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
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
                      <table class="order_step03_style1">
                        <tr>
                          <td class="order_step03_style2">
                            <table class="order_step03_style3">
                              <tr>
          
                                <td class="order_step03_style5">
                                  step1. 檢視 / 修改
                                </td>
                                <td class="order_step03_style5">
                                  step2. 預覽 / 付款
                                </td>
                                <td class="order_step03_style4">
                                  step3. 完成訂單
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
          
                        <tr>
                          <td>
                            <form action="/MVC/EasyMVC/Order/check_order" method="post" class="order_step03_style15">
                              <!-- ------------------------ -->
                              <!--      顯示購物車內的商品    -->
                              <!-- ------------------------ -->
                              <table class="order_step03_style7">
                                <tr>
                                  <td class="order_step03_style16">編號</td>
                                  <td class="order_step03_style17">名稱</td>
                                  <td class="order_step03_style18">單價</td>
                                  <td class="order_step03_style19">數量</td>
                                  <td class="order_step03_style20">小計</td>
                                </tr>
                                <?php 
                                  if (isset($_SESSION['item']['item_index'])) 
                                  {					
                                    // 巡迴購物車內的每個商品
                                    foreach ($_SESSION['item']['item_index'] as $key => $value) 
                        						{ 
                                ?>
                                <tr>
                                  <!-- 顯示購物車內商品的編號 -->
                                  <td class="order_step03_style22">
                                    <?php echo $_SESSION['item']['item_index'][$key]; ?>
                                  </td>
                                  <!-- 顯示購物車內商品的名稱 -->
                                  <td class="order_step03_style22">
                                    <?php echo $_SESSION['item']['item_name'][$key]; ?>
                                  </td>
                                  <!-- 顯示購物車內商品的單價 -->
                                  <td class="order_step03_style22">
                                    <?php echo $_SESSION['item']['price'][$key]; ?>
                                  </td>
                                  <!-- 顯示購物車內商品的數量 -->
                                  <td class="order_step03_style22">
                                    <?php echo $_SESSION['item']['quantity'][$key]; ?>
                                  </td>
                                  <!-- 顯示購物車內商品的總價 -->
                                  <td class="order_step03_style22">
                                    <?php echo $_SESSION['item']['total_price'][$key]; ?>
                                  </td>
                                </tr>
                                <?php 
                                    }
                                  } 
                                ?>
                              </table>
                              <!-- ------------------- -->
                              <!--     顯示運費與總計    -->
                              <!-- ------------------- -->
                              <table class="order_step03_style28">
                                <tr>
                                  <td class="order_step03_style26">
                                    付款方式
                                  </td>
                                  <td class="order_step03_style27">
                                    <?php echo $_SESSION['payment'] ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="order_step03_style26">
                                    訂單編號
                                  </td>
                                  <td class="order_step03_style27">
                                    <?php echo $_SESSION['order_index'] ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="order_step03_style26">
                                    訂單金額
                                  </td>
                                  <td class="order_step03_style27">
                                    新台幣
                                    <span class="order_step03_style31">
                      							  <?php echo $_SESSION['total'] ?>
                                    </span> 元整
                                  </td>
                                </tr>
                              </table>
                              <!-- ------------------------ -->
                              <!-- 顯示 "上一步","下一步" 按鈕 -->
                              <!-- ------------------------ -->
                              <table class="order_step03_style7">
                                <tr>
                                  <td class="order_step03_style29">
                                    <input type="button" value="上一步" onclick="document.location='/MVC/EasyMVC/Order/back_order_step02'; return false;" />
                                  </td>
                                  <td class="order_step03_style30">
                                    <input type="submit" value="確認付款" />
                                  </td>
                                </tr>
                              </table>
                              <input name="username" id="username" type="hidden" value="<?php echo $row['username']; ?>" />
                              <input name="order_index" id="order_index" type="hidden" value="<?php echo $_SESSION['order_index']; ?>" />
                              <input name="order_price" id="order_price" type="hidden" value="<?php echo $_SESSION['total']; ?>" />
                              <input name="payment" id="payment" type="hidden" value="<?php echo $_SESSION['payment']; ?>" />
                              <input name="order_date" id="order_date" type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                              <input name="insert" id="insert" type="hidden" value="order_form" />
                            </form>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </body>
          
          </html>