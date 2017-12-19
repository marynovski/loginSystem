<?php

class DataBase{

	private $hostname;
	private $DBName;
	private $DBUser;
	private $DBPass;
	private $tableName;
	private $connection;

	function __construct($hostname, $DBName, $DBUser, $DBPass, $tableName){
		$this->hostname = $hostname;
		$this->DBName = $DBName;
		$this->DBUser = $DBUser;
		$this->DBPass = $DBPass;
		$this->tableName = $tableName;
	}

	private function connect(){
		try{
			$this->connection = new PDO('mysql:host='.$this->hostname.';dbname='.$this->DBName, $this->DBUser, $this->DBPass);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Nie działa coś!";
			exit();
		}
	}

	public function getNumberOfRows(){
		self::connect();
		
		$countOfRowsPDO = $this->connection->prepare('SELECT COUNT(id) FROM '.$this->tableName);
		$countOfRowsPDO->execute();
		$countOfRows = $countOfRowsPDO->fetchColumn();
		$countOfRowsPDO->closeCursor();

		return $countOfRows;
	}

	public function getUserFromDB($query){
		self::connect();
		$countOfRows = self::getNumberOfRows();

		$data = $this->connection->prepare($query);
		$data->execute();
		
		$userData = $data->fetch();

		$data->closeCursor();
		unset($data);

		return $userData;

	}

	function __destruct(){
		$this->connection = null;
	}

}

$db = new DataBase("localhost", "users", "root", "", "users");
$user = $db->getUserFromDB("SELECT * FROM users WHERE id=1");


?>