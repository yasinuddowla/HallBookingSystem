<?php
require_once __DIR__ . '/config.php';
global $pdoConnection;
// Database connection (replace with your credentials)
$host = $_config['db_host'];
$dbname = $_config['db_dbname'];
$username = $_config['db_username'];
$password = $_config['db_password'];

try {
    $pdoConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
