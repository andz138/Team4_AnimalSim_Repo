<?php
session_start();
include('user_data_handler.php');

$feedMessage = $playMessage = $eventMessage = '';

// Function to keep values within the range of 0 and 100
function limitToRange($value) {
    return max(0, min(100, $value));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Feed button
    if (isset($_POST['feed']) && $_SESSION['energy'] < 100 && $_SESSION['hunger'] > 0) {
        $_SESSION['happiness'] = limitToRange($_SESSION['happiness'] + 5);
        $_SESSION['hunger'] = limitToRange($_SESSION['hunger'] - 3);
        $_SESSION['energy'] = limitToRange($_SESSION['energy'] + 5);
        $_SESSION['score'] += 1;
    } 
    // Play button
    elseif (isset($_POST['play']) && $_SESSION['energy'] > 0 && $_SESSION['hunger'] < 100) {
        $_SESSION['happiness'] = limitToRange($_SESSION['happiness'] + 5);
        $_SESSION['hunger'] = limitToRange($_SESSION['hunger'] + 3);
        $_SESSION['energy'] = limitToRange($_SESSION['energy'] - 5);
        $_SESSION['score'] += 1;
    } 
    // Logout button
    elseif (isset($_POST['logout'])) {
        updateUserFile($_SESSION['username'], $_SESSION['happiness'], $_SESSION['hunger'], $_SESSION['energy'], $_SESSION['score']);
        session_unset();
        session_destroy();
        header("location: logout.php");
        exit();
    }

    // Error messages
    if (isset($_POST['feed']) && $_SESSION['hunger'] === 100) {
        $feedMessage = '<p class="error-message">Cannot feed when hunger is at 100%</p>';
    } elseif (isset($_POST['play']) && $_SESSION['energy'] === 0) {
        $playMessage = '<p class="error-message">Cannot play when energy is at 0%</p>';
    } elseif (isset($_POST['feed']) && $_SESSION['energy'] === 100) {
        $feedMessage = '<p class="error-message">Cannot feed when energy is at 100%</p>';
    } elseif (isset($_POST['play']) && $_SESSION['hunger'] === 0) {
        $playMessage = '<p class="error-message">Cannot play when hunger is at 0%</p>';
    }

    // Event when pet poops
    if (rand(1, 7) == 1) {
        $_SESSION['happiness'] = limitToRange(round($_SESSION['happiness'] / 2)); // Drop happiness by 50%
        $eventMessage = '<p class="error-message">Oh no! Your pet pooped, and happiness was cut by half.</p>';
    }

    // Determine pet mood
    $petMood = 'normal';

    if ($_SESSION['hunger'] >= 60) {
        $petMood = 'hungry';
    } elseif ($_SESSION['energy'] <= 50) {
        $petMood = 'tired';
    } elseif ($_SESSION['happiness'] <= 50) {
        $petMood = 'sad';
    } elseif ($_SESSION['happiness'] > 50) {
        $petMood = 'happy';
    }
    
}
?>
