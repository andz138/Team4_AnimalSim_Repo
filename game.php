<?php
session_start();

if (!isset($_SESSION['happiness'])) {
    $_SESSION['happiness'] = 100; // Initial happiness level
    $_SESSION['hunger'] = 50;    // Initial hunger level
    $_SESSION['energy'] = 100;   // Initial energy level
}

// Decrease happiness, hunger, and energy over time
$_SESSION['happiness'] -= 5;
$_SESSION['hunger'] += 2;
$_SESSION['energy'] -= 3;

// Ensure attribute values stay within valid ranges
$_SESSION['happiness'] = max(0, $_SESSION['happiness']);
$_SESSION['hunger'] = min(100, $_SESSION['hunger']);
$_SESSION['energy'] = max(0, $_SESSION['energy']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['feed'])) {
        // Increase happiness when fed
        // Decrease hunger and increase energy when fed
        $_SESSION['happiness'] += 10;
        $_SESSION['hunger'] -= 10;
        $_SESSION['energy'] += 10;

        // Ensure attribute values stay within valid ranges
        $_SESSION['happiness'] = min(100, $_SESSION['happiness']);
        $_SESSION['hunger'] = max(0, $_SESSION['hunger']);
        $_SESSION['energy'] = min(100, $_SESSION['energy']);
    } elseif (isset($_POST['play'])) {
        // Increase happiness when playing
        // Decrease energy when playing
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

<?php
include('common.php');
myHeader('Virtual Pet Game');
?>

<h1><?php echo $_SESSION['username']?>'s Virtual Pet</h1>

<div class="container">
    <img class="pet-image" src="pet.png" alt="Pet">
    <div class="stats">
        <p>Happiness: <?php echo $_SESSION['happiness']?>%</p>
        <p>Hunger: <?php echo $_SESSION['hunger']?>%</p>
        <p>Energy: <?php echo $_SESSION['energy']?>%</p>
    </div>
</div>

<form method="POST" action="">
    <input type="submit" name="feed" value="Feed">
    <input type="submit" name="play" value="Play">
    <input type="submit" name="logout" value="Logout">
</form>

<?php
myFooter();
?>
