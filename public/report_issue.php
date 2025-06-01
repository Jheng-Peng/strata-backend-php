<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

$host = 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = '6543';
$dbname = 'postgres';
$user = 'postgres.zemhidfkcpsqaokpujkr';
$password = '你的密码'; // ⚠️ 替换成你自己的

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
  echo json_encode(["error" => "Connection failed"]);
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$name = trim($data["name"]);
$unit = trim($data["unit"]);
$message = trim($data["message"]);

$query = "INSERT INTO maintenance (name, unit_number, message, created_at) VALUES ($1, $2, $3, NOW())";
$result = pg_query_params($conn, $query, [$name, $unit, $message]);

if ($result) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["error" => "Insert failed"]);
}
?>