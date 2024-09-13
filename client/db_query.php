<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../includes/templates/auth.php';

// Check if data posted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
}

// Get action type (insert, update, delete)
$databaseAction = $_POST['db_action'];
// Add
if ($databaseAction == 'insert') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $stmt = $pdoConnection->prepare("INSERT INTO client (name, phone, address, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $address, $email]);

    redirect_to($_config['base_url'] . 'client');
}

// Update
if ($databaseAction == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $stmt = $pdoConnection->prepare("UPDATE client SET name = ?, phone = ?, address = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $phone, $address, $email, $id]);

    redirect_to($_config['base_url'] . 'client');
}

// Delete
if ($databaseAction == 'delete') {
    $id = $_POST['id'];

    $stmt = $pdoConnection->prepare("DELETE FROM client WHERE id = ?");
    $stmt->execute([$id]);

    redirect_to($_config['base_url'] . 'client');
}
