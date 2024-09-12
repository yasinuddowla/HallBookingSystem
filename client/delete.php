<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../includes/templates/auth.php';

// Delete client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $pdoConnection->prepare("DELETE FROM client WHERE id = ?");
    $stmt->execute([$id]);

    redirect_to($_config['base_url'] . 'client');
}
