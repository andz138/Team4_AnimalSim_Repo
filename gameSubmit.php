<?php
session_start();

// Initialize attributes if not set
$_SESSION += ['happiness' => 100, 'hunger' => 50, 'energy' => 100];

// Decrease happiness, increase hunger, and decrease energy over time
$_SESSION['happiness'] -= 5;
$_SESSION['hunger'] += 2;
$_SESSION['energy'] -= 3;

// Ensure attribute values stay within valid ranges
$_SESSION['happiness'] = max(0, min(100, $_SESSION['happiness']));
$_SESSION['hunger'] = max(0, min(100, $_SESSION['hunger']));
$_SESSION['energy'] = max(0, min(100, $_SESSION['energy']));

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['feed'])) {
        // Increase happiness, decrease hunger, and increase energy when fed
        $_SESSION['happiness'] += 10;
        $_SESSION['hunger'] -= 10;
        $_SESSION['energy'] += 10;

        // Ensure attribute values stay within valid ranges
        $_SESSION['happiness'] = min(100, $_SESSION['happiness']);
        $_SESSION['hunger'] = max(0, $_SESSION['hunger']);
        $_SESSION['energy'] = min(100, $_SESSION['energy']);
    } elseif (isset($_POST['play'])) {
        // Increase happiness and decrease energy when playing
        $_SESSION['happiness'] += 15;
        $_SESSION['energy'] -= 5;

        // Ensure attribute values stay within valid ranges
        $_SESSION['happiness'] = min(100, $_SESSION['happiness']);
        $_SESSION['energy'] = max(0, $_SESSION['energy']);
    } elseif (isset($_POST['logout'])) {
        // Logout
        session_unset();
        session_destroy();
        header("location: logout.php");
        exit();
    }
}
?>
