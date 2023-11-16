<!-- leaderboard.php -->
<?php
include('common.php');
myHeader('Leaderboard');
?>

<body class="leaderboard">
    <div class="container">
        <h1>Leaderboard</h1>
        
        <table>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Happiness</th>
                <th>Hunger</th>
                <th>Energy</th>
            </tr>
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
<?php
myFooter();
?>
</body>
</html>
