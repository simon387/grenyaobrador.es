<?php

include_once '../config/database.php';
include_once '../models/operation.php';

class Product
{
	private $conn;
	private $table_name = "product";
	public $id;
	public $category;
	public $name;
	public $supplier;
	public $unit;
	public $deposit;
	public $outflow0;
	public $outflow1;
	public $left;
	public $period;
	public $note;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function getBySupplierAndPeriod($supplierID, $periodID)
	{
		$query = "SELECT p.id, p.category, p.name, p.supplier, p.unit, p.deposit, p.outflow0, " .
			"p.outflow1, p.left, p.period, p.note, (select description from operation o where o.product = p.id order by " .
			"timestamp desc limit 1) as 'lastOperation' FROM " . $this->table_name . " p WHERE " .
			"p.supplier = " . $supplierID . " AND p.period = " . $periodID;

		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function update($userId, $description)
	{
		$query = "UPDATE " . $this->table_name . "
            SET
                deposit = :deposit,
                outflow0 = :outflow0,
                outflow1 = :outflow1,
                `left` = :left
            WHERE
                id = :id";

		$stmt = $this->conn->prepare($query);

		$this->id = htmlspecialchars(strip_tags($this->id));
		$this->deposit = htmlspecialchars(strip_tags($this->deposit));
		$this->outflow0 = htmlspecialchars(strip_tags($this->outflow0));
		$this->outflow1 = htmlspecialchars(strip_tags($this->outflow1));
		$this->left = htmlspecialchars(strip_tags($this->left));

		$stmt->bindParam(":id", $this->id);
		$stmt->bindParam(":deposit", $this->deposit);
		$stmt->bindParam(":outflow0", $this->outflow0);
		$stmt->bindParam(":outflow1", $this->outflow1);
		$stmt->bindParam(":left", $this->left);

		if ($stmt->execute()) {
			$database = new Database();
			$db = $database->getConnection();
			$operation = new Operation($db);
			$operation->user = $userId;
			$operation->product = $this->id;
			$operation->description =$description;
			if ($operation->create()) {
				return true;
			}
		}

		return false;
	}

	function search($query_, $period_)
	{
		$query = "select p.id, p.category, p.name, s.name as supplier, p.unit, p.deposit, p.outflow0, p.outflow1, p.`left`, p.note" .
			",(select description from operation o where o.product = p.id order by timestamp desc limit 1) as 'lastOperation' " .
			"from " . $this->table_name . " p, supplier s where p.supplier = s.id and p.period = " . $period_ .
			" and p.name like '%" . $query_ .  "%'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}