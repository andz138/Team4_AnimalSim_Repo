<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $providedUsername = $_POST['username'];
    $providedPassword = $_POST['password'];

    if ($_SESSION['username'] === $providedUsername && $_SESSION['password'] === $providedPassword) {
        header("location: game.php");
        exit();
    } else {
        echo "Login failed. Please check your username and password.";
    }
}
?>

<?php
include('common.php');
myHeader('Login');
?>
<body class="login">
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
<?php
myFooter();
?>
