<?php
function myHeader($title) {
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>$title</title>
  <link rel='stylesheet' type='text/css' href='styles.css'>
</head>
";
}

function myFooter() {
echo "
<footer>
  <br>
  <a href='index.php'>Go to Homepage</a>
  <br><br>
  (C) Copyright Virtual Pet Inc.
</footer>
";
}
?>
