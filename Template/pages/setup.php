<?php
require_once "Utils.php";
Utils::config_check(substr($_SERVER['REQUEST_URI'],1));
if ($_SERVER['REQUEST_METHOD']==='POST'){
    var_dump($_POST);
    $config_file = fopen("../../.config","w");
    fwrite($config_file,"DBNAME:".$_POST['dbname']);
    fwrite($config_file,"\n");
    fwrite($config_file,"USERNAME:".$_POST['username']);
    fclose($config_file);
    $db_file = fopen("../../Database/".$_POST['dbname'],"w");
    fclose($db_file);
    header('Location: '.'dashboard.php');
}
Utils::config_db();
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
        <label>User Name:</label>
        <input type="text" name="username"/> <br>
        <label>DB Name:</label>
        <input type="text" name="dbname"/> <br>
        <button>Submit</button>
    </form>
</body>
</html>