<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
    <h1>Are you sure you want to delete this project?</h1>
    <div class="container" style="border-style: solid; height: 400px;">
        <h2>Advertising Project Name: <?php echo $getProjectByID['Advertising_Project_Name'] ?></h2>
        <h2>Kind of Product: <?php echo $getProjectByID['Kind_Of_Product'] ?></h2>
        <h2>Brand Name: <?php echo $getProjectByID['Brand_Name'] ?></h2>
        <h2>Target Audience: <?php echo $getProjectByID['Target_Audience'] ?></h2>
        <h2>Added By: <?php echo $getProjectByID['Added_By'] ?></h2>
        <h2>Last Time Update: <?php echo $getProjectByID['Last_Timestamp'] ?></h2>
        <h2>Date Added: <?php echo $getProjectByID['Date_Added'] ?></h2>

        <div class="deleteBtn" style="float: right; margin-right: 10px;">
            <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&advertisingAgent_id=
            <?php echo $_GET['advertisingAgent_id']; ?>" method="POST">
                <input type="submit" name="deleteProjectBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>