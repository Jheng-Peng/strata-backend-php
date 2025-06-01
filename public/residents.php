<?php
// Supabase connection info
$host = 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = '6543';
$dbname = 'postgres';
$user = 'postgres.zemhidfkcpsqaokpujkr';
$password = '@Fuhai199771';

// Connect to PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// Query residents table
$result = pg_query($conn, "SELECT name, unit_number, share, email FROM residents");

$rows = [];
while ($row = pg_fetch_assoc($result)) {
    $rows[] = $row;
}

header('Content-Type: application/json');
echo json_encode($rows);
?>