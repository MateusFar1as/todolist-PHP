<?php
$host = 'db';
$port = 3306;
$dbName = 'todolist';
$username = 'user';
$password = 'user_password';

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
  $pdo = new PDO($dsn, $username, $password);

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'CREATE TABLE IF NOT EXISTS tasks(
    id INT AUTO_INCREMENT PRIMARY KEY,
    task TEXT NOT NULL
  );';

  $pdo->exec($sql);
} catch(PDOException $e) {
  echo 'Connection Failed: ' . $e->getMessage();
}
