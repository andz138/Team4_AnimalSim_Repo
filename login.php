<?php
session_start();
include('user_data_handler.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $providedUsername = $_POST['username'];
    $providedPassword = $_POST['password'];

    if (validateUser($providedUsername, $providedPassword)) {
        $_SESSION['username'] = $providedUsername;
        $userData = getUserData($providedUsername);
        
        if ($userData != null) {
            $_SESSION['happiness'] = $userData['happiness'];
            $_SESSION['hunger'] = $userData['hunger'];
            $_SESSION['energy'] = $userData['energy'];
            $_SESSION['score'] = $userData['score'];
        } else {
            $_SESSION['happiness'] = 50;
            $_SESSION['hunger'] = 50;
            $_SESSION['energy'] = 50;
            $_SESSION['score'] = 0;
        }

        header("location: game.php");
        exit();
    } else {
        $loginError = "Login failed. Please check your username and password.";
    }
}

function validateUser($providedUsername, $providedPassword)
{
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);

    foreach ($users as $user) {
        [$existingUsername, $existingPassword] = explode(',', $user);
        if ($existingUsername === $providedUsername && $existingPassword === $providedPassword) {
            return true;
        }
    }

    return false;
}
?>

<?php 
include('common.php');
myHeader('Login');
?>

<body class="login">
    <fieldset>
        <legend>Login</legend>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>

        <?php if (isset($loginError)) { echo "<p class=error>$loginError</p>"; } ?>
    </fieldset>
    
<?php 
myFooter(); 
?>
</body>
</html>
