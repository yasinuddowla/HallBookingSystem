<?php
// Include the init.php to use database connection and other configurations
require_once __DIR__ . '/../config/init.php';

// Start session
session_start();

// Initialize response array
$response = array('success' => false, 'message' => '');

// Retrieve POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        try {
            // Prepare SQL statement using PDO
            $sql = "SELECT id, username, password FROM users WHERE username = :username";
            $stmt = $pdoConnection->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Check if username exists
                if ($stmt->rowCount() == 1) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Verify password
                    if (password_verify($password, $user['password'])) {
                        // Password is correct, start a new session
                        $_SESSION["logged_in"] = true;
                        $_SESSION["id"] = $user['id'];
                        $_SESSION["username"] = $user['username'];

                        // Return success response
                        $response['success'] = true;
                        $response['message'] = 'Login successful!';
                    } else {
                        $response['message'] = 'Invalid password.';
                    }
                } else {
                    $response['message'] = 'No account found with that username.';
                }
            } else {
                $response['message'] = 'Something went wrong. Please try again later.';
            }
        } catch (PDOException $e) {
            $response['message'] = 'Database error: ' . $e->getMessage();
        }
    } else {
        $response['message'] = 'Please enter both username and password.';
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
