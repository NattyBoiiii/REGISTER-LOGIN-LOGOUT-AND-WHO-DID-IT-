<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])) { ?>
        <h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
    <?php } unset($_SESSION['message']); ?>
    <h1> Welcome admin <?php echo $_SESSION['username']; ?> to the Advertising Management Systems. Add agents to jobs! </h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="firstName"> First Name </label>
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName"> Last Name </label>
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="WorkSpaceNickname"> Work Space Nickname </label>
            <input type="text" name="WorkSpaceNickname" required>
        </p>
        <p>
            <label for="gender"> Gender </label>
            <input type="text" name="gender" required>
        </p>
        <p>
            <label for="dateOfBirth"> Date of Birth </label>
            <input type="text" name="dateOfBirth" required>
            <input type="submit" name="insertAdvertAgentBtn">
        </p>
    </form>
    <input type="submit" value="Other Admins" onclick="window.location.href='viewuser.php'">
    <input type="submit" value="Logout" onclick="window.location.href='logout.php'">
    <input type="submit" value="Audit Logs" onclick="window.location.href='auditlog.php'">
    <?php $getAllAdvertAgent = getAllAdvertAgent($pdo); ?>
    <?php foreach ($getAllAdvertAgent as $row) { ?>
    <div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
        <h3> First Name: <?php echo $row['first_name']; ?></h3>
        <h3> Last Name: <?php echo $row['last_name']; ?></h3>
        <h3> Work Space Nickname: <?php echo $row['work_space_nickname']; ?></h3>
        <h3> Gender: <?php echo $row['gender']; ?></h3>
        <h3> Date of Birth: <?php echo $row['date_of_birth']; ?></h3>
        <h3> Date Added: <?php echo $row['date_added']; ?></h3>
        <div class="editAndDelete" style="float: right; margin-right: 20px;">
            <a href="viewprojects.php?advertisingAgent_id=<?php echo $row['advertisingAgent_id']; ?>">View Projects</a>
            <a href="editadvertagent.php?advertisingAgent_id=<?php echo $row['advertisingAgent_id']; ?>">Edit</a>
            <a href="deleteadvertagent.php?advertisingAgent_id=<?php echo $row['advertisingAgent_id']; ?>">Delete</a>
        </div>
    </div>
    <?php } ?>
</body>
</html>