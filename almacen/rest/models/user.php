<?php

include_once '../config/database.php';

class User
{
	private $conn;
	private $table_name = "user_";
	public $id;
	public $email;
	public $name;
	public $pass;
	public $role;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function getInfoById($id_)
	{
		$query = "select u.id, u.email, u.name, r.name as role from " . $this->table_name .
			" u, role_ r where u.role = r.id and u.id=" . $id_ . " limit 1";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}
