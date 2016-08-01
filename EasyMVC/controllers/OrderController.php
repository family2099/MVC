<?php
session_start();
date_default_timezone_set('Asia/Taipei');
class OrderController extends Controller 
{
    
    
    
    // function clear_cart()
    // {
    //     // echo 123;
    //     // exit;
    //     $_SESSION['item']['item_index'] = NULL;
    //     unset($_SESSION['item']['item_index']);
    //     // 商品的名稱
    //     $_SESSION['item']['item_name'] = NULL;
    //     unset($_SESSION['item']['item_name']);
    //     // 商品的單價
    //     $_SESSION['item']['price'] = NULL;
    //     unset($_SESSION['item']['price']);
    //     // 商品的數量
    //     $_SESSION['item']['quantity'] = NULL;
    //     unset($_SESSION['item']['quantity']);
    //     // 商品的總價
    //     $_SESSION['item']['total_price'] = NULL;
    //     unset($_SESSION['item']['total_price']);
    //     // 訂單編號
    //     $_SESSION['item']['order_index'] = NULL;
    //     unset($_SESSION['item']['order_index']);
        
    //     //$this->view("index", $);
        
    //     header("location:/EasyMVC/Index/get_Index/0");
        
    // }
    function clear_cart()
    {
        
        $car_clear = $this->model("database");
        $car_clear->clear_car_all();
        
        // $this->view("clear_cart");
        
        header("location:/MVC/EasyMVC/Index/get_Index/0");
        
    }
    
 
    function to_order_step02()
    {
        
        /*------------------------------------
         修改購買商品的數量
        ------------------------------------*/
        if (isset($_POST['order_nextstep'])) 
        {
            
          $car_modify = $this->model("database");  
          $car_modify->modify_car($_POST['order_quantity']);  
          // [數量]文字欄位的索引值
        //   $index = 0;
        //   // 巡迴購物車內的所有商品
        //   foreach ($_SESSION['item']['item_index'] as $key => $value) 
        //   {
        //     // 有商品
        //     if (isset($_SESSION['item']['item_index'][$key])) 
        //     {			
        // 			// 重新設定商品的數量
        //       $_SESSION['item']['quantity'][$key] = $_POST['order_quantity'][$index];
        // 		}
        // 		// [數量]文字欄位的索引值
        // 		$index++;
        //   } 
        // 	var_dump($_POST['order_quantity']);
        	$this->view("order_step02");
        }
        /*------------------------------------
         刪除購買的商品
        ------------------------------------*/
        if (isset($_POST['order_delete']) && isset($_POST['order_check'])) 
        { 
            $car_delete = $this->model("database");  
            $car_delete->delete_car(); 
          
            
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
          $pay_set = $this->model("database"); 
          $pay_set->set_pay();
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
   將購買清單和購買明細存入資料庫
   
   ------------------------------------------*/
   
        
    function check_order()
    {
        if ((isset($_POST["insert"])) && ($_POST["insert"] == "order_form")) 
        {
            $insert_detail_data = $this->model("database");
            
            $insert_detail_data->order_detail_insert($_POST['order_index'],$_POST['order_price'],$_POST['payment'],$_POST['order_date']);    
                
        }
        
        if ((isset($_POST["insert"])) && ($_POST["insert"] == "order_form")) 
        {
        	
            $insert_all_data = $this->model("database");
            $insert_all_data->all_order_insert();
                	
                
        
        		
        
            
            header("Location:/MVC/EasyMVC/Order/clear_cart");
        
        }
        
        
        
    }
 
    
    
}    