<?php
class IndexController extends Controller 
{
    /*----------------------------------
    controller可以接收post和get的值
    要計算的全都放在modles
    controller只要做導頁、接收view傳來的值並傳給modles的方法和接收modles傳來的值並給view
    
    
    如果不想要用陣列方式傳值給view,可自行寫class去設定要傳的格式、變數數量等等

    ------------------------------*/

    
    /*-----------------------------------------
    進入網頁要先顯示資料該方發就是進入index要顯是什麼的方法
    
    ----------------------------------------------*/
    
    function get_Index($c1) 
    {

        if (isset($c1)) 
        {
    	    $get_Index_data = $this->model("database");
    	    $totalrecord=$get_Index_data->get_Index_data_number($c1);
    	    
    	}
    	
  
        $this->view("index",$totalrecord);
        
    }
 
    /*-----------------------------------------
    
    登入驗證方法
    ----------------------------------------------*/
    
    function get_login_data() 
    {
        
        if((isset($_POST['userN'])) and (isset($_POST['passW']))) 
        {
            $get_login_data = $this->model("database");
            $result=$get_login_data->login_check($_POST['userN'],$_POST['passW']);
            
            $this->get_Index(0);
            
        }
        else 
        {
            $this->get_Index(0);
            	  
            
        }
            
        
    }
     /*-----------------------------------------
    
    將點選的商品資料從資料庫取出並存入session
    ----------------------------------------------*/
    
    function add_to_cart($q1)
    {
        
        if(isset($q1))
        {
            
          
            $get_car_data = $this->model("database");
            $get_car_data->add_car($q1);
            
            
            
        }
       


        
        header('Location: /MVC/EasyMVC/Index/get_order_step01');
        
        
    }
    
     /*-----------------------------------------
    
    導向member_center檔
    ----------------------------------------------*/
    
    function get_member_center()
    {
        
        $get_member_page = $this->model("database");
        
        if($get_member_page->to_member_center())
        {
            
            $this->view("member_center");
            
        }
        else
        {
            header('Location: /MVC/EasyMVC/Index/get_Index/0');
            
        }
        
        
    
    }
    /*-----------------------------------------
    
    導向order_step01檔
    要注意點購物車是否出現刪除或清空有出現改用這個方法
    ----------------------------------------------*/
    function get_order_step01()
    {
        
        $check_car_commodity = $this->model("database");
        $check_car_commodity->check_car();
        $this->view("order_step01");
    
    }
    
    
    function get_item_detail($q1)
    {
        

        if (isset($q1))
        {
         
            $get_detail_data = $this->model("database");
            $result=$get_detail_data->add_car($q1);
            $data=$result;
       

            $this->view("item_detail",$data);
        }
        
        

    
    }
    
    
    /*-----------------------------------------
    登出方法
    
    ----------------------------------------------*/
    
    function logout() 
    {
        
        
        $this->view("log_out");
            	  
        
        
    }
    
    
    
    
//////////////////////////////////////////////
    function get_category_page($q1,$q2,$c) 
    {
        if ((isset($q1)) and (isset($q2)) and (isset($c))) 
        {
            
            
            $get_category_data = $this->model("database");
            $totalRows=$get_category_data->get_category_Rows($q1,$q2,$c);
            
            
            $this->view("category_result",$totalRows);
            
       
        }
        else 
        {
            $this->get_Index();
            	  
            
        }
            
        
    }
    







    
}


?>