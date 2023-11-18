<?php
include 'common.php';
include 'gameSubmit.php';
myHeader('Virtual Pet Game');
?>

<body class="game">
    <div class="pet-stats-container">
        <div class="pet-stat"><p>Happiness: <?php echo $_SESSION['happiness']; ?>%</p>
            <?php echo $eventMessage; ?>
        </div>
        <div class="pet-stat"><p>Hunger: <?php echo $_SESSION['hunger']; ?>%</p>
            <?php echo $feedMessage; ?>
        </div>
        <div class="pet-stat"><p>Energy: <?php echo $_SESSION['energy']; ?>%</p>
            <?php echo $playMessage; ?>
        </div>
        <div class="pet-stat"><p>Score: <?php echo $_SESSION['score']; ?></p></div>
    </div>

    <form method="POST" action="">
        <button class="button" type="submit" name="feed" value="Feed">
            <img class="bowl-image" src="images/bowl.png" alt="Pet">
        </button>
        <button class="button" type="submit" name="play" value="Play">
            <?php
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
        <div class="pet-mood"><?php echo "Pet Mood: " . ucfirst($petMood); ?></div>
        <input class="logout" type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
