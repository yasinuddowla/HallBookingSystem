<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../includes/templates/auth.php';

// Get action type (insert, update, delete)
$databaseAction = $_POST['db_action'] ?? '';
// Add
if ($databaseAction == 'insert') {
    $hall_id = $_POST['hall_id'];
    $client_id = $_POST['client_id'];
    $slot = $_POST['slot'];
    $date = $_POST['date'];

    $stmt = $pdoConnection->prepare("INSERT INTO booking (hall_id, client_id, slot, date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$hall_id, $client_id, $slot, $date]);

    redirect_to($_config['base_url'] . 'booking');
}
// Delete
if ($databaseAction == 'delete') {
    $id = $_POST['id'];

    $stmt = $pdoConnection->prepare("DELETE FROM booking WHERE id = ?");
    $stmt->execute([$id]);

    redirect_to($_config['base_url'] . 'booking');
}
