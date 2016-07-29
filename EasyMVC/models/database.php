<?php

require_once("dbconfig.php");


   
//Session都在modles處理

  
class database extends dbconfig
{



    /*-----------------------------------------------------
	 讀取test資料庫的computer_books資料表總紀錄數
	-----------------------------------------------------*/
    
    function get_Index_data_number($database_name)
    {
        
        
        $query = "SELECT * FROM " . $database_name;
    // 	echo $query;
    	$result = $this->_dsnconn->prepare($query);
        $result->execute();    
        if($result)
    	{
    		// 結果集的記錄筆數
    		$totalRows = $result->rowCount();
    		// 總頁數,ceil() 函數向上捨入為最接近的整數(就是有小數點就直接進位)。
            //$totalPages = ceil($totalRows / $rowsPerPage);
    		//echo $totalRows;
    	}
    	
    	return $totalRows;
        
    }
    
    
    
    
    /*-----------------------------------------------------
	 讀取test資料庫的computer_books資料表10筆紀錄
	-----------------------------------------------------*/
    
    function get_computer_books_ten_record($database_name,$startrecord)
    {
        
        $p=0;
        $query = "SELECT * FROM " . $database_name. " LIMIT ". $startrecord.", 10";
    // 	echo $query;
    	$result = $this->_dsnconn->prepare($query);
    
        $result->execute();    
        if ($result) 
        {	
    		$rows_currentPage = $result->rowCount();
    		//echo $rowsOfCurrentPage;
    		while($row=$result->fetch(PDO::FETCH_ASSOC))
			{
			   $arr[$p]=array(
					"id"=>$row["id"],
					"title"=>$row["title"],
					"author"=>$row["author"],
					"translator"=>$row["translator"],
					"contents"=>$row["contents"],
					"feature"=>$row["feature"],
					"cd"=>$row["cd"],
					"publishdate"=>$row["publishdate"],
					"price"=>$row["price"],
					"discount"=>$row["discount"],
					"saleprice"=>$row["saleprice"],
					"item_index"=>$row["item_index"],
					"photo"=>$row["photo"],
					"publisher"=>$row["publisher"],
					"color"=>$row["color"],
					"category"=>$row["category"],
					"category_type"=>$row["category_type"]
			
			    );
			
			    $p++; 
			    
			}   
    		
    	}
        $row=Array();
        
        $row[0]=$rows_currentPage;
        $row[1]=$arr;
    	
    	return $row;
        
    }
    
    /*--------------------------------------
    確認登入帳密  
    ----------------------------------------*/
    function login_check($userName,$passWord)
    {
            $p=0;
        
    	    $query="SELECT username, password, userlevel FROM member WHERE username=? AND password=?";
            
            $result = $this->_dsnconn->prepare($query);
            
           	//設定要查詢的參數值
           	$result->bindValue(1, $userName, PDO::PARAM_STR);
           	$result->bindValue(2, $passWord, PDO::PARAM_STR);
           	
           	$result->execute();
           	
            if($result)
        	{
        	
        		while($row=$result->fetch(PDO::FETCH_ASSOC))
    			{
    			   $arr[$p]=array(
    					"username"=>$row["username"],
    					"userlevel"=>$row["userlevel"]
    				);
    			
    			    $p++; 
    			    
    			}
    			
    // 			var_dump($arr);
    			return $arr;
        
        	}
   
    }
    /*--------------------------------
    取得id的資料
    Indexcontroller可以用這個方法有
    add_to_cart,get_item_detail
    -----------------------------------*/
    function add_car($database_name,$id)
    {
        // echo $database_name;
        // echo $id;
        // exit;
        
        $query ="SELECT * FROM " .$database_name. " WHERE id = ?";
        // echo $query;
        // exit;
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $id, PDO::PARAM_STR);
        
        $result->execute();
        
        if($result)
    	{
    	    $totalRows = $result->rowCount();
    		//目前的紀錄
    		$row=$result->fetch(PDO::FETCH_ASSOC);
    		
    	}
        
        
        return $row;
        
    }
    //取的結果集的紀錄比數和總頁數
    function get_category_Rows($database_name,$data_category,$data_category_type)
    {
    
        $query = "SELECT * FROM " . $database_name .  
      	" WHERE category = ? AND category_type = ? ORDER BY publishdate DESC";
    	
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $data_category, PDO::PARAM_STR);
        $result->bindValue(2, $data_category_type, PDO::PARAM_STR);
        $result->execute();
        if($result)
    	{
    		// 結果集的記錄筆數
    		$totalRows = $result->rowCount();
    		
    		
    	}
        
        
        return $totalRows;
    }
    //取得類別資料庫十筆記錄
    function get_category_ten_data($database_name,$data_category,$data_category_type,$startRow,$rowsPerPage)
    {
    
        $query = "SELECT * FROM " . $database_name .  
      	" WHERE category = ? AND category_type = ? ORDER BY publishdate DESC LIMIT ".$startRow." ,".$rowsPerPage;
    	
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $data_category, PDO::PARAM_STR);
        $result->bindValue(1, $data_category_type, PDO::PARAM_STR);
        $result->execute();
        if ($result) 
        {	
    		$rows_currentPage = $result->rowCount();
    		//echo $rowsOfCurrentPage;
    		while($row=$result->fetch(PDO::FETCH_ASSOC))
			{
			   $arr[$p]=array(
					"id"=>$row["id"],
					"title"=>$row["title"],
					"author"=>$row["author"],
					"translator"=>$row["translator"],
					"contents"=>$row["contents"],
					"feature"=>$row["feature"],
					"cd"=>$row["cd"],
					"publishdate"=>$row["publishdate"],
					"price"=>$row["price"],
					"discount"=>$row["discount"],
					"saleprice"=>$row["saleprice"],
					"item_index"=>$row["item_index"],
					"photo"=>$row["photo"],
					"publisher"=>$row["publisher"],
					"color"=>$row["color"],
					"category"=>$row["category"],
					"category_type"=>$row["category_type"]
			
			    );
			
			    $p++; 
			    
			}   
    		
    	}
        $row=Array();
        
        $row[0]=$rows_currentPage;
        $row[1]=$arr;
    	
    	return $row;
        
        
        
    }
    
    
    // function get_category_page($q1="",$q2="",$c1) 
    // {
    //     $page = 0;
    //     $rowsPerPage = 10;
    //     $database = array("computer_books", "education_software", "commerical_software");
    //     $category = array("電腦圖書", "教育軟體", "商用軟體");
    //     $category_type = array(0 => array("網頁設計","程式語言","多媒體系列"), 
    //     	1 => array("影像多媒體","電腦繪圖","工具軟體"), 2 => array("作業系統","防毒防駭","文書處理"));
                
    //     if ((isset($q1)) and (isset($q2)) and $c1) 
    //     {
    //         // $data=Array();
    //         // $data[0]=$q1;
    //         // $data[1]=$q2;
    //         $page = $c1;
    //         $index1 = $q1;//資料庫編號
    //         $index2 = $q2;//陣列編號
            
    //         $_SESSION['database'] = $database[$index1];
    //         $_SESSION['category'] = $category[$index1];
    //         $_SESSION['category_type'] = $category_type[$index1][$index2];
            
            
            
    //         $get_category_data = $this->model("database");
    //         $totalRows=$get_category_data->get_category_Rows($_SESSION['database'],$_SESSION['category'],$_SESSION['category_type']);
            
    //         $totalPages = ceil($totalRows / $rowsPerPage);
    //         $startRow = $page * $rowsPerPage;
            
    //         $get_category_ten_record=$this->model("database");
            
    //         $result=$get_category_ten_record->get_category_ten_data($_SESSION['database'],$_SESSION['category'],$_SESSION['category_type'],$startRow,$rowsPerPage);
            
            
    //         $data=Array();
    //         // $data[]=Array();
    //         //目前頁數
    //         $data[0]=$page;
    //         //computer_book全部資料筆數
    //         $data[1]=$totalrecord;
    //         //computer_book資料產生的總頁數
    //         $data[2]=$totalPages;
    //         //目前資料的筆數
    //         $data[3]=$result[0];
    //         //結果集
    //         $data[4]=$result[1];
    //         // var_dump($data[4]);
        
        
            
            
    //         $this->view("category_result",$data);
            
    //     }
    //     else 
    //     {
    //         $this->get_Index();
            	  
            
    //     }
            
        
    // }
//---------------------------------------------------------------------------------------------    
//上面都跟index有關




//該頁未完
    function member_data($usrN)
    {
        
        $query = "SELECT * FROM member WHERE username = ?";
        $result = $this->_dsnconn->prepare($query);
        // echo $usrN;
        $result->bindValue(1, $usrN, PDO::PARAM_STR);
        
        $result->execute();
        // var_dump($result);
        if($result)
    	{
    		$row=$result->fetch(PDO::FETCH_ASSOC);
    // 		var_dump($row);
    	}
        
        
        return $row;
        
    }
    
    
    function order_detail_insert($q1,$q2,$q3,$q4,$q5)
    {
        
        
        $query = "INSERT INTO order_list (username, order_index, order_price, payment, order_date) VALUES (?,?,?,?,?)";
        $result = $this->_dsnconn->prepare($query);
        $result->bindValue(1, $q1, PDO::PARAM_STR);
        $result->bindValue(2, $q2, PDO::PARAM_STR);
        $result->bindValue(3, $q3, PDO::PARAM_STR);
        $result->bindValue(4, $q4, PDO::PARAM_STR);
        $result->bindValue(5, $q5, PDO::PARAM_STR);
        
        // $result->debugDumpParams();
        
        // echo "<hr>";
        
        $result->execute();
        
        
        
        
        
    }
    
    
    
    function all_order_insert($q1,$q2,$q3,$q4,$q5,$q6,$q7)
    {
        // echo $q1;
        // exit;
        $query = "INSERT INTO order_detail (username, order_index, item_index, item_name, quantity, single_price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $q1, PDO::PARAM_STR);
        $result->bindValue(2, $q2, PDO::PARAM_STR);
        $result->bindValue(3, $q3, PDO::PARAM_STR);
        $result->bindValue(4, $q4, PDO::PARAM_STR);
        $result->bindValue(5, $q5, PDO::PARAM_STR);
        $result->bindValue(6, $q6, PDO::PARAM_STR);
        $result->bindValue(7, $q7, PDO::PARAM_STR);
        var_dump($result);
        
        // $result->debugDumpParams();
        
        // echo "<hr>";
        
        $result->execute();
        
        // var_dump($result);
        
    }
    
    
/************************************************/
 
 //下面是member處理的方法
 
    function member_updata($q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12)
    {
        
        $query="UPDATE member SET username=?, password=?, name=?, sex=?, birthday=?, email=?, phone=?, address=?, uniform=?, unititle=?, userlevel=? WHERE id=?";
        
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $q1, PDO::PARAM_STR);
        $result->bindValue(2, $q2, PDO::PARAM_STR);
        $result->bindValue(3, $q3, PDO::PARAM_STR);
        $result->bindValue(4, $q4, PDO::PARAM_STR);
        $result->bindValue(5, $q5, PDO::PARAM_STR);
        $result->bindValue(6, $q6, PDO::PARAM_STR);
        $result->bindValue(7, $q7, PDO::PARAM_STR);
        $result->bindValue(8, $q8, PDO::PARAM_STR);
        $result->bindValue(9, $q9, PDO::PARAM_STR);
        $result->bindValue(10, $q10, PDO::PARAM_STR);
        $result->bindValue(11, $q11, PDO::PARAM_STR);
        $result->bindValue(12, $q12, PDO::PARAM_STR);
        
        // $data= array($q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10,$q11,$q12);
        
        // var_dump($data);
       
        
        $result->execute();
        
       
        
        
        
        
        
    }
    //查詢訂單
    function member_select_order($q1)
    {
        $p=0;
        
        $query="SELECT order_index, order_price, payment, order_date FROM order_list WHERE `username` =?";
        
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $q1, PDO::PARAM_STR);
        
        
        $result->execute();
        
    
        
        if ($result) 
        {	
    		$totalRows = $result->rowCount();
    		//echo $rowsOfCurrentPage;
    		while($row=$result->fetch(PDO::FETCH_ASSOC))
			{
			   $arr[$p]=array(
					"order_index"=>$row["order_index"],
					"order_price"=>$row["order_price"],
					"payment"=>$row["payment"],
					"order_date"=>$row["order_date"]
					
			
			    );
			
			    $p++; 
			    
			}   
    		
    	
            $row=Array();
        
            $row[0]=$totalRows;
            $row[1]=$arr;
        	
        	return $row;
            
            
        }
        
        
        
    }
 //刪除訂單
    function member_delete_order($q1)
    {
        // echo $q1;
        // exit;
        $query="DELETE FROM order_list WHERE order_index=?";
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $q1, PDO::PARAM_STR);
        $result->execute();
        
    }    
 //取的訂單明細
    function get_order_list($q1)
    {
        // echo $q1;
        // exit;
        $p=0;
        $query="SELECT item_name, quantity, single_price, total_price FROM order_detail WHERE order_index=?";
        $result = $this->_dsnconn->prepare($query);
        
        $result->bindValue(1, $q1, PDO::PARAM_STR);
        $result->execute();
        
        
        if ($result) 
        {	
    		$totalRows = $result->rowCount();
    // 		echo $totalRows;
    // 		exit;
    		while($row=$result->fetch(PDO::FETCH_ASSOC))
			{
			   $arr[$p]=array(
					"item_name"=>$row["item_name"],
					"quantity"=>$row["quantity"],
					"single_price"=>$row["single_price"],
					"total_price"=>$row["total_price"]
					
			
			    );
			
			    $p++; 
			    
			}   
    		
    	
            $row=Array();
        
            $row[0]=$totalRows;
            $row[1]=$arr;
        // 	var_dump($arr);
        // 	exit;
        	return $row;
            
            
        }
    }  
 
 
 
     /*-------------------------
     關閉資料連接
     -------------------------*/
    public function close() {
        $this->$_dsnconn = null;
    }
     
     
     

}
// $obj=new database;
// $obj->login_check('andy','a123456');
// var_dump($obj->get_computer_books_ten_record('computer_books',0));
// var_dump($obj->get_Index_data_number('computer_books'));
// class login extends ConfigDataBase{
    
?>
