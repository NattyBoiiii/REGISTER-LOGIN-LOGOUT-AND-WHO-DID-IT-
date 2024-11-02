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
    <a href="viewprojects.php?advertisingAgent_id=<?php echo $_GET['advertisingAgent_id']; ?>">
    View Each Projects</a>
    <h1>Edit the Project!</h1>
    <?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
    <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>
    &advertisingAgent_id=<?php echo $_GET['advertisingAgent_id']; ?>" method="POST">
        <p>
            <label for="advertisingProjectName"> Product Name </label>
            <input type="text" name="advertisingProjectName"
            value="<?php echo $getProjectByID['Advertising_Project_Name']; ?>">
        </p>
        <p>
            <label for="kindOfProduct"> Kind of Product </label>
            <input type="text" name="kindOfProduct"
            value="<?php echo $getProjectByID['Kind_Of_Product']; ?>">
        </p>
        <p>
            <label for="brandName"> Brand Name </label>
            <input type="text" name="brandName"
            value="<?php echo $getProjectByID['Brand_Name']; ?>">
        </p>
        <p>
            <label for="targetAudience"> Target Audience </label>
            <input type="text" name="targetAudience"
            value="<?php echo $getProjectByID['Target_Audience']; ?>">
            <input type="submit" name="editProjectBtn">
        </p>
    </form>
</body>
</html>