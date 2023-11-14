<?php
include('common.php');
myHeader('Virtual Pet Game');
?>

<body class="index">
    <div class="container">
        <h1>Welcome to the Virtual Pet Game!</h1>
        
        <a href="login.php">Login</a></li>
        <a href="register.php">Register</a></li>
        
        <!-- Display the leaderboard here -->
        <h2>Leaderboard</h2>
        <table>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Happiness</th>
                <th>Hunger</th>
                <th>Energy</th>
            </tr>
            <!-- Replace the sample data with your actual leaderboard data -->
            <tr>
                <td>1</td>
                <td>User1</td>
                <td>90%</td>
                <td>40%</td>
                <td>80%</td>
            </tr>
            <tr>
                <td>2</td>
                <td>User2</td>
                <td>85%</td>
                <td>50%</td>
                <td>75%</td>
            </tr>
            <tr>
                <td>3</td>
                <td>User3</td>
                <td>80%</td>
                <td>30%</td>
                <td>90%</td>
            </tr>
        </table>
    </div>
</body>

<?php
myFooter();
?>