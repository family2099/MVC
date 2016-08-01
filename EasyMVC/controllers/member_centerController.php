<?php
session_start();
class member_centerController extends Controller 
{

//到member_modify頁面


    function get_member_data()
    {
        
        
        
        $get_member_data = $this->model("database");
        
        $result=$get_member_data->member_data();
        // var_dump($result);
        // exit;
        $this->view("member_modify",$result);
        
        
    }
//去更新member_modify資料到資料庫
 
    function update_member_data()
    {
        if ((isset($_POST["update"])) && ($_POST["update"] == "member_info")) 
        {
        
            
            
            $updata_member_data = $this->model("database");
            
            $updata_member_data->member_updata($_POST['username'],$_POST['password'],$_POST['name'],$_POST['sex'],$_POST['birthday'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['uniform'],$_POST['unititle'],$_POST['userlevel'],$_POST['id']);
            
            header("Location:/MVC/EasyMVC/Index/get_member_center");
            
        
        }
    }
//到orderhandle頁面

   function to_orderhandle()
    {
        
        
        $get_select_order = $this->model("database");
        
        $result=$get_select_order->member_select_order();
        // var_dump($result[1]);
        // exit;
        $this->view("orderhandle",$result);
        
        
    }
    
    
//刪除訂單
    function delete_order()
    {
        
        
        if(isset($_POST['order_index']))
    	{
    	   // echo $_POST['order_index'];
    	   // exit;
    		$exe_delete_order = $this->model("database");
    		$result=$exe_delete_order->member_delete_order($_POST['order_index']);
    		header("Location:/MVC/EasyMVC/member_center/to_orderhandle");
    	}
        
        
        
        
        
    }
    
    //取的訂單明細
    function order_list($q)
    {
        
        
        if(isset($q))
    	{
    	    $member_delete_order = $this->model("database");
    		
    		$result=$member_delete_order->get_order_list($q);

    	}
        $this->view("order_list",$result);
        
    }
    
    

}