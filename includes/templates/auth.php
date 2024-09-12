<?php
require_once __DIR__ . '/../../config/config.php';
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    redirect_to($_config['base_url'] . 'auth/login.php');
}
