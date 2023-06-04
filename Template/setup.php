<?php
/**
 * Setup Page
 */
echo "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplex Setup Page</title>
</head>
<body>
    <p> Enter the Following to setup Simplex
    <form method="POST">
        <label>App Name:</label>
        <input type="text" name="appname"/> <br>
        <label>DB Name:</label>
        <input type="text" name="dbname"/> <br>
        <button>Submit</button>
    </form>
</body>
</html>