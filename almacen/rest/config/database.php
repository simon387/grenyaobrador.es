<?php

include('config.php');

class Database
{
	public $conn;

	public function getConnection()
	{
		$this->conn = null;
		try {
			$this->conn = new PDO("mysql:host=" . Config::$host . ";dbname=" . Config::$db_name, Config::$username, Config::$password);
			$this->conn->exec("set names utf8");
			$this->conn->exec("SET GLOBAL time_zone='Europe/Madrid");
		} catch (PDOException $exception) {
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->conn;
	}

	function getUserByEmailAndPassword($email_, $pass_)
	{
		$query = "SELECT u.id, u.email, u.name, r.name as role FROM user_ u, role_ r WHERE " .
			"u.email = '" . $email_ . "' AND u.pass = '" . $pass_ . "' and u.role = r.id";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}

