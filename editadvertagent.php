<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php $getAdvertAgentID = getAdvertAgentByID($pdo, $_GET['advertisingAgent_id']); ?>
    <h1>Edit Agent!</h1>
    <form action="core/handleForms.php?advertisingAgent_id=<?php echo $_GET['advertisingAgent_id']; ?>" method="POST">
        <p>
            <label for="firstName"> First Name </label>
            <input type="text" name="firstName" value="<?php echo $getAdvertAgentID['first_name']; ?>">
        </p>
        <p>
            <label for="lastName"> Last Name </label>
            <input type="text" name="lastName" value="<?php echo $getAdvertAgentID['last_name']; ?>">
        </p>
        <p>
            <label for="workSpaceNickname"> Work Space Nickname </label>
            <input type="text" name="workSpaceNickname" value="<?php echo $getAdvertAgentID['work_space_nickname']; ?>">
        </p>
        <p>
            <label for="gender"> Gender </label>
            <input type="text" name="gender" value="<?php echo $getAdvertAgentID['gender']; ?>">
        </p>
        <p>
            <label for="dateOfBirth"> Date of Birth </label>
            <input type="text" name="dateOfBirth" value="<?php echo $getAdvertAgentID['date_of_birth']; ?>">
            <input type="submit" name="editAdvertAgentBtn">
        </p>
    </form>
</body>
</html>