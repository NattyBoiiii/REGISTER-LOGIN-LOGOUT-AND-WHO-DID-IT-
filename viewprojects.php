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
	<?php $getAllInfoByAdvertAgentID = getAdvertAgentByID($pdo, $_GET['advertisingAgent_id']); ?>
	<h1>First Name: <?php echo $getAllInfoByAdvertAgentID['first_name']; ?></h1>
	<h1>Add New Project</h1>
	<form action="core/handleForms.php?advertisingAgent_id=<?php echo isset($_GET['advertisingAgent_id']) ? $_GET['advertisingAgent_id'] : ''; ?>" method="POST">

		<p>
			<label for="AdvertisingProjectName">Project Name</label> 
			<input type="text" name="AdvertisingProjectName" required>
		</p>
        <p>
			<label for="kindOfProduct">Kind of Product</label> 
			<input type="text" name="kindOfProduct" required>
		</p>
        <p>
			<label for="brandName">Brand Name</label> 
			<input type="text" name="brandName" required>
		</p>
        <p>
			<label for="targetAudience">Target Audience</label> 
			<input type="text" name="targetAudience" required>
            <input type="submit" name="insertNewProjectBtn">
		</p>
	</form>
	<input type="submit" value="Return to home" onclick="window.location.href='index.php'">
	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Project ID</th>
		<th>Advertising Agent ID</th>
	    <th>Project Name</th>
	    <th>Kind of Product</th>
        <th>Brand Name</th>
        <th>Target Audience</th>
		<th>Added By</th>
		<th>Last Timestamp</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getProjectsByAdvertisingAgent = getProjectsByAdvertAgent($pdo, $_GET['advertisingAgent_id']); ?>
	  <?php foreach ($getProjectsByAdvertisingAgent as $row) { ?>
	  <tr>
	  	<td><?php echo $row['Project_ID']; ?></td>	
		<td><?php echo $row['Advertising_Agent_ID']; ?></td>	  	
		<td><?php echo $row['Advertising_Project_Name']; ?></td>	  	
	  	<td><?php echo $row['Kind_Of_Product']; ?></td>	  	
	  	<td><?php echo $row['Brand_Name']; ?></td>	  	
        <td><?php echo $row['Target_Audience']; ?></td>	  	
		<td><?php echo $row['Added_By']; ?></td>	
		<td><?php echo $row['Last_Timestamp']; ?></td>	  	
	  	<td><?php echo $row['Date_Added']; ?></td>
	  	<td>
	  		<a href="editproject.php?project_id=<?php echo $row['Project_ID']; ?>&advertisingAgent_id=<?php echo $_GET['advertisingAgent_id']; ?>">Edit</a>
	  		<a href="deleteproject.php?project_id=<?php echo $row['Project_ID']; ?>&advertisingAgent_id=<?php echo $_GET['advertisingAgent_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>