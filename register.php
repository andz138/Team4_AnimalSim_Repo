<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkUserExists($username)) {
        $registerError = "Username already exists. Please choose a different username.";
    } else {
        $data = "$username,$password" . PHP_EOL;
        file_put_contents('users.txt', $data, FILE_APPEND);

        $_SESSION['username'] = $username;

        $thankYouMessage = "Thank you for registering!<br>Now <a href='login.php'>login to play!</a>";
    }
}

function checkUserExists($username)
{
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    
    foreach ($users as $user) {
        list($existingUsername, $existingPassword) = explode(',', $user);
        if ($existingUsername == $username) {
            return true;
        }
    }

    return false;
}
?>

<?php 
include('common.php');
myHeader('Register');
?>

<body class="login">
    <fieldset>
        <legend>Register</legend>

        <?php if (isset($thankYouMessage)): ?>
            <p><?= $thankYouMessage ?></p>
        <?php else: ?>
            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br><br>
                <input type="submit" value="Register">
            </form>

            <?php if (!empty($registerError)): ?>
                <p class='error'><?= $registerError ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </fieldset>
    
<?php
myFooter();
?>
</body>
</html>