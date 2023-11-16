<?php
session_start();

include 'common.php';
include 'gameSubmit.php';

myHeader('Virtual Pet Game');
?>

<body class="game">
    <div class="pet-stats-container">
        <?php
        $attrs = ['happiness', 'hunger', 'energy', 'score'];
        foreach ($attrs as $a) {
            echo '<div class="pet-stat"><p>' . ucfirst($a) . ': ' . $_SESSION[$a] . '%</p></div>';
        }
        ?>
    </div>

    <div class="speech-bubble">
        <img class="speech-bubble-image" src="images/bubble.png" alt="Speech Bubble">
    </div>

    <form method="POST" action="">
        <button class="button" type="submit" name="feed" value="Feed">
            <img class="bowl-image" src="images/bowl.png" alt="Pet">
        </button>
        <button class="button" type="submit" name="play" value="Play">
            <img class="pet-image" src="images/pet.png" alt="Pet">
        </button>
        <input class="logout" type="submit" name="logout" value="Logout">
    </form>
</body>

</html>
