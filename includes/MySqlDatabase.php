<?php 
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
		$result = mysqli_query($this->connection,'select * from users');	
		return $result;		
	}

	public function close_connection(){
		if(isset($this->connection)){
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}


}

$db = new MySqlDatabase();

$users = $db->query();


if(mysqli_num_rows($users) > 0){
	while($row = mysqli_fetch_assoc($users)){
		echo '<pre/>'; print_r($row); 
	}
}
/*

$db->query('select * from users;')

print_r($db);*/


/*function foo(){
	return 'yuio';
}

$a = 'value';


echo foo();

echo '<br/>';

die(foo());*/
