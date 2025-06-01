<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$host = 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = '6543';
$dbname = 'postgres';
$user = 'postgres.zemhidfkcpsqaokpujkr';
$password = '@Fuhai199771';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

$result = pg_query($conn, "SELECT name, unit_number, message, created_at FROM maintenance ORDER BY created_at DESC");

$rows = [];
while ($row = pg_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);
?>