<?php
session_start();
date_default_timezone_set('Asia/Taipei');
class OrderController extends Controller 
{
    
    
    
    function clear_cart()
    {
        // echo 123;
        // exit;
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
        
        //$this->view("index", $);
        
        header("location:/EasyMVC/Index/get_Index/0");
        
    }
    /*------------------------------------
     刪除購買的商品
    ------------------------------------*/
    function to_order_step02()
    {
        
        /*------------------------------------
         修改購買商品的數量
        ------------------------------------*/
        if (isset($_POST['order_nextstep'])) 
        {
          // [數量]文字欄位的索引值
          $index = 0;
          // 巡迴購物車內的所有商品
          foreach ($_SESSION['item']['item_index'] as $key => $value) 
          {
            // 有商品
            if (isset($_SESSION['item']['item_index'][$key])) 
            {			
        			// 重新設定商品的數量
              $_SESSION['item']['quantity'][$key] = $_POST['order_quantity'][$index];
        		}
        		// [數量]文字欄位的索引值
        		$index++;
          } 
        // 	echo "123";
        	$this->view("order_step02");
        }
        /*------------------------------------
         刪除購買的商品
        ------------------------------------*/
        if (isset($_POST['order_delete']) && isset($_POST['order_check'])) 
        { 
          // 巡迴所有的商品核取方塊
          foreach ($_POST['order_check'] as $key => $value) 
          {
                // 商品的核取方塊被勾選, $_POST['order_check'][$key]等於value屬性值
                if (isset($_POST['order_check'][$key])) 
        		{	      
        			// 第?個商品被刪除
        			$index = $_POST['order_check'][$key];
        			// 商品的編號				
        			$_SESSION['item']['item_index'][$index] = NULL;
        			unset($_SESSION['item']['item_index'][$index]);
        			// 商品的名稱
        			$_SESSION['item']['item_name'][$index] = NULL;
        			unset($_SESSION['item']['item_name'][$index]);
        			// 商品的單價
        			$_SESSION['item']['price'][$index] = NULL;
        			unset($_SESSION['item']['price'][$index]);
        			// 商品的數量
        			$_SESSION['item']['quantity'][$index] = NULL;
        			unset($_SESSION['item']['quantity'][$index]);
        			// 商品的總價
        			$_SESSION['item']['total_price'][$index] = NULL;
        			unset($_SESSION['item']['total_price'][$index]);	
        		}
          }
          
            $_SESSION['has_item'] = TRUE;
            // 商品的編號				
            if (!isset($_SESSION['item']['item_index']) || (count($_SESSION['item']['item_index']) == 0)) {
              // 購物車內沒有商品
              $_SESSION['has_item'] = FALSE;
            }
            
            $this->view("order_step01");
          
        }
        
        
        
        
    
    }
    
    /*------------------------------------
     order_step02的上一步
    ------------------------------------*/
    
    function to_order_step01()
    {
        
        
        $this->view("order_step01");
        
        
    }
    
        
        
    function to_order_step03()
    {
        
        if (isset($_POST['order_nextstep'])) 
        {
          $_SESSION['payment'] = $_POST['payment'];
          $this->view("order_step03");
        }
        
        
        
    }  
        
        	
    /*------------------------------------
     order_step03的上一步
    ------------------------------------*/    
        
    function back_order_step02()
    {
        
        
        $this->view("order_step02");
        
        
    }    
   /*--------------------------------------
   check_order還未完工要清session
   
   ------------------------------------------*/
   
        
    function check_order()
    {
        if ((isset($_POST["insert"])) && ($_POST["insert"] == "order_form")) 
        {
            $insert_detail_data = $this->model("database");
            
            $insert_detail_data->order_detail_insert($_SESSION['username'],$_POST['order_index'],$_POST['order_price'],$_POST['payment'],$_POST['order_date']);    
                
        }
        
        if ((isset($_POST["insert"])) && ($_POST["insert"] == "order_form")) 
        {
        	if (isset($_SESSION['item']['item_index'])) 
            {
        	
        	    foreach ($_SESSION['item']['item_index'] as $key => $value) 
        		{
        			if (isset($_SESSION['item']['item_index'][$key])) 
        			{
                	    $insert_all_data = $this->model("database");
                	    $insert_all_data->all_order_insert($_SESSION['username'],$_SESSION['order_index'],$_SESSION['item']['item_index'][$key],$_SESSION['item']['item_name'][$key],$_SESSION['item']['quantity'][$key],$_SESSION['item']['price'][$key],$_SESSION['item']['total_price'][$key]);
                	
                    }
        		}
        // 	if ($result) {
        		header("Location:/EasyMVC/Order/clear_cart");
        // 	}
            }
        
        }
        
        
        
    }
 
    
    
}    