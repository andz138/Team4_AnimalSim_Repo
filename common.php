<?php
function myHeader($title) {
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>$title</title>
  <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
";
}

function myFooter() {
echo "
<footer>
  <br>
  Virtual Pet Game 
</footer>
</body>
</html>
";
}
?>
