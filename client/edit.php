<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../includes/templates/auth.php';
// Update client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $stmt = $pdoConnection->prepare("UPDATE client SET name = ?, phone = ?, address = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $phone, $address, $email, $id]);

    redirect_to($_config['base_url'] . 'client');
}
