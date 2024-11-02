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
    <h1>Are you sure you want to delete this agent?</h1>
    <?php $getAdvertAgentID = getAdvertAgentByID($pdo, $_GET['advertisingAgent_id']); ?>
    <div class="container" style="border-style: solid; height: 400px;">
        <h2>First Name: <?php echo $getAdvertAgentID['first_name']; ?></h2>
        <h2>Last Name: <?php echo $getAdvertAgentID['last_name']; ?></h2>
        <h2>Work Space Nickname: <?php echo $getAdvertAgentID['work_space_nickname']; ?></h2>
        <h2>Gender: <?php echo $getAdvertAgentID['gender']; ?></h2>
        <h2>Date of Birth: <?php echo $getAdvertAgentID['date_of_birth']; ?></h2>
        <h2> Date Added: <?php echo $getAdvertAgentID['date_added']; ?></h2>

        <div class="deleteBtn" style="float: right; margin-right: 10px;">
            <form action="core/handleForms.php?advertisingAgent_id=<?php echo $_GET['advertisingAgent_id']; ?>" method="POST">
                <input type="submit" name="deleteAdvertAgentBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>