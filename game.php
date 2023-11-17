<?php
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
            <?php
            // images based on the pet's mood
            switch ($petMood) {
            case 'happy':
                echo '<img class="pet-image" src="images/happy.png" alt="Happy Pet">';
                break;
            case 'sad':
                echo '<img class="pet-image" src="images/sad.png" alt="Sad Pet">';
                break;
            case 'hungry':
                echo '<img class="pet-image" src="images/hungry.png" alt="Hungry Pet">';
                break;
            case 'tired':
                echo '<img class="pet-image" src="images/tired.png" alt="Tired Pet">';
                break;
            default:
                echo '<img class="pet-image" src="images/normal.png" alt="Pet">';
            }
            ?>
        </button>
        <input class="logout" type="submit" name="logout" value="Logout">
    </form>
</body>

</html>
