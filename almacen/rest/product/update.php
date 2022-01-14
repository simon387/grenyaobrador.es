<?php
require_once '../../rest/config/protect.php';
with('../../fe/components/pages/login.php', "scope");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->id = $data->id;
$product->deposit = $data->deposit;
$product->outflow0 = $data->outflow0;
$product->outflow1 = $data->outflow1;
$product->left = $data->left;

if ($product->update($data->userId, $data->lastOperation)) {
	http_response_code(200);
	echo json_encode(array("response" => "Product updated"));
} else {
	http_response_code(503);
	echo json_encode(array("response" => "Impossible to update the product data"));
}
