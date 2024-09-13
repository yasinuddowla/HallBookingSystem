<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../includes/templates/auth.php';

if (!empty($_GET['id'])) {
    $hallId = $_GET['id'];
    // Fetch hall details
    $stmt = $pdoConnection->prepare("SELECT 
                                        h.*, m.name AS manager_name, m.phone AS manager_phone, m.email AS manager_email
                                     FROM hall h 
                                     JOIN manager m ON h.manager_id = m.id 
                                     WHERE h.id = ?");
    $stmt->execute([$hallId]);
    $hall = $stmt->fetch(PDO::FETCH_ASSOC);
    // Return data as JSON
    echo json_encode($hall);
}


// Get action type (insert, update, delete)
$databaseAction = $_POST['db_action'] ?? '';
if (is_null($databaseAction)) {
    return;
}
// Insert data for hall and manager
if ($databaseAction == 'insert') {
    // Get hall data
    $hall_name = $_POST['hall_name'];
    $hall_phone = $_POST['hall_phone'];
    $hall_address = $_POST['hall_address'];
    $hall_rent = $_POST['hall_rent'];
    $hall_size = $_POST['hall_size'];

    // Get manager data
    $manager_name = $_POST['manager_name'];
    $manager_phone = $_POST['manager_phone'];
    $manager_email = $_POST['manager_email'];

    // Start transaction
    $pdoConnection->beginTransaction();

    try {
        // Insert Manager
        $stmt = $pdoConnection->prepare("INSERT INTO manager (name, phone, email) VALUES (?, ?, ?)");
        $stmt->execute([$manager_name, $manager_phone, $manager_email]);

        // Get the last inserted manager ID
        $manager_id = $pdoConnection->lastInsertId();

        // Insert Hall
        $stmt = $pdoConnection->prepare("INSERT INTO 
                                            hall (name, phone, address, rent, size, manager_id) 
                                            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$hall_name, $hall_phone, $hall_address, $hall_rent, $hall_size, $manager_id]);

        // Commit the transaction
        $pdoConnection->commit();

        // Redirect to the hall page
        redirect_to($_config['base_url'] . 'hall');
    } catch (Exception $e) {
        // Rollback the transaction if something goes wrong
        $pdoConnection->rollBack();
        // Log or handle the error as needed
        echo "Error: " . $e->getMessage();
    }
}

// Update
if ($databaseAction == 'update') {
    // Get hall and manager data
    $hall_id = $_POST['id'];
    $hall_name = $_POST['hall_name'];
    $hall_phone = $_POST['hall_phone'];
    $hall_address = $_POST['hall_address'];
    $hall_rent = $_POST['hall_rent'];
    $hall_size = $_POST['hall_size'];

    $manager_id = $_POST['manager_id'];
    $manager_name = $_POST['manager_name'];
    $manager_phone = $_POST['manager_phone'];
    $manager_email = $_POST['manager_email'];
    // Start transaction
    $pdoConnection->beginTransaction();

    try {
        // Update Manager
        $stmt = $pdoConnection->prepare("UPDATE manager SET 
                                            name = ?, 
                                            phone = ?, 
                                            email = ?
                                        WHERE id = ?");
        $stmt->execute([$manager_name, $manager_phone, $manager_email, $manager_id]);

        // Update Hall
        $stmt = $pdoConnection->prepare("UPDATE hall SET 
                                            name = ?, 
                                            phone = ?, 
                                            address = ?, 
                                            rent = ?, 
                                            size = ? 
                                        WHERE id = ?");
        $stmt->execute([$hall_name, $hall_phone, $hall_address, $hall_rent, $hall_size, $hall_id]);

        // Commit the transaction
        $pdoConnection->commit();

        // Redirect to the hall page
        redirect_to($_config['base_url'] . 'hall');
    } catch (Exception $e) {
        // Rollback the transaction if something goes wrong
        $pdoConnection->rollBack();
        // Log or handle the error as needed
        echo "Error: " . $e->getMessage();
    }
}

// Delete
if ($databaseAction == 'delete') {
    $hall_id = $_POST['id'];

    // Start transaction
    $pdoConnection->beginTransaction();

    try {
        // Delete Hall
        $stmt = $pdoConnection->prepare("DELETE FROM hall WHERE id = ?");
        $stmt->execute([$hall_id]);

        // Commit the transaction
        $pdoConnection->commit();

        // Redirect to the hall page
        redirect_to($_config['base_url'] . 'hall');
    } catch (Exception $e) {
        // Rollback the transaction if something goes wrong
        $pdoConnection->rollBack();
        // Log or handle the error as needed
        echo "Error: " . $e->getMessage();
    }
}
