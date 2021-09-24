<?php
$dsn = 'mysql:dbname=php_test_db;host=127.0.0.1';
$user = '';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功";
} 
catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit();
}
?>