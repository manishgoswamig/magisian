<?php
namespace includes{


require_once('env.php');

class MySqlDatabase {

	public function __construct(){
		$this->open_connection();
	}

	public function open_connection(){
		$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if(mysqli_connect_errno()){
			die('Database connection failed'.mysqli_connect_error()."(" . mysqli_connect_errno() . ")");
		}
	}

	public function query($query = ''){
		$result = mysqli_query($this->connection,$query);
		if(!$result){
			die('Database query failed.');
		}	
		return $result;		
	}

	public function close_connection(){
		if(isset($this->connection)){
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}


}

}