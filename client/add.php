<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../includes/templates/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$stmt = $pdoConnection->prepare("INSERT INTO client (name, phone, address, email) VALUES (?, ?, ?, ?)");
	$stmt->execute([$name, $phone, $address, $email]);

	redirect_to($_config['base_url'] . 'client');
}
