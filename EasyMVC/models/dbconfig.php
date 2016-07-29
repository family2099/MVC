<?php

class dbconfig
{

    protected $_dbms = "mysql";             //資料庫類型 
    protected $_host = "localhost";         //資料庫ip位址
    protected $_port = "3306";           //資料庫埠
    protected $_username = "root";          //資料庫用戶名
    protected $_password = "";              //密碼
    protected $_dbname = "test";            //資料庫名
    protected $_charset = "utf-8";       //資料庫字元編碼
    protected $_dsnconn;                    //data soruce name 資料來源





    /*-------------------------
    預設先連資料庫
    -------------------------*/
    function __construct()
    {
        
        try 
        {
                
            //特別注意空格和單雙引號可能導致錯誤(天啊)
    		$this->_dsnconn = new PDO($this->_dbms.':host='.$this->_host.';dbname='.$this->_dbname,$this->_username,$this->_password);
    	    // echo $this->$_dsnconn;
    		//echo self::$_dsnconn;不能用echo $statement variable as it is a PDOStatement Object會產生錯誤
    		//Object of class Pdo Mysql Operator could not be converted to string
    		// 資料庫使用 UTF8 編碼
    		$this->_dsnconn->exec("SET CHARACTER SET utf8");
    	    
        	//var_dump(self::$_dsnconn);
    		//echo "123";
		} 
		catch (PDOException $e) {
		    
			return 'Error!: ' . $e->getMessage() . '<br />';
		}
        
    
    }




}


?>