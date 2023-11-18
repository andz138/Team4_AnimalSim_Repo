<?php
include('common.php');
include('user_data_handler.php');

myHeader('Virtual Pet Game');
?>

<body class="index">
    <div class="container">
        <h1>Welcome to the Virtual Pet Game!</h1>

        <ul>
            <li><img src="images/login.png" alt="Login Image"><a href="login.php">Login</a></li>
            <li><img src="images/register.png" alt="Register Image"><a href="register.php">Register</a></li>
        </ul>
        
        <h2>Leaderboard</h2>
        <table>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Score</th>
            </tr>

            <?php
            $filename = 'user_data.txt';
            $leaderboard = [];

            if (file_exists($filename)) {
                $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                foreach ($lines as $line) {
                    $parts = explode(",", $line);
                    $leaderboard[] = ['username' => $parts[0], 'score' => intval($parts[4])];
                }

                usort($leaderboard, function($a, $b) {
                    return $b['score'] - $a['score'];
                });

                $rank = 1;
                foreach ($leaderboard as $user) {
                    echo "<tr><td>$rank</td><td>{$user['username']}</td><td>{$user['score']}</td></tr>";
                    $rank++;
                }
            }
            ?>

        </table>
    </div>

    <?php
    myFooter();
    ?>
</body>
</html>
