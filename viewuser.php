<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
require_once 'core/dbConfig.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: "Arial";
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Username</th>
		<th>First Name</th>
	    <th>Last Name</th>
	    <th>Branch Location</th>
        <th>Date Added</th>
	  </tr>
    <?php $getUserByID = getAllUsersInfo($pdo, $_SESSION['user_id']); ?>
    <?php foreach ($getUserByID as $row) { ?>
    <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['branchlocation']; ?></td>
        <td><?php echo $row['date_added']; ?></td> 
    </tr>
    <?php } ?>
    <input type="submit" value="Return" onclick="window.location.href='index.php'">
</body>
</html>