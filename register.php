<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    header("location: index.php");
    exit();
}
?>

<?php
include('common.php');
myHeader('Register');
?>

<h2>Register</h2>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

<?php
myFooter();
?>
