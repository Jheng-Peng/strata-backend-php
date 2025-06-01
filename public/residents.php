<?php
// Supabase connection info
$host = 'db.zemhidfkcpsqaokpujkr.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
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