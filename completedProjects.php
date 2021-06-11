<?php

require_once("db_connect.php"); ?>

<html>
<head>
	<title>Completed ToDo's List</title>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<h1>Completed ToDo's</h1>
	<hr>	

<?php

	//Establish Connection to db
	db();
	global $link;

	$query = "SELECT projectID, projectTitle, projectDescription, startDate, date FROM ToDoCompleted";
	$selectProj = mysqli_query($link, $query);
	//If there is more than 0 records...
	if(mysqli_num_rows($selectProj) >= 1){
		//...and while there is data in records...
		while($row = mysqli_fetch_array($selectProj)){
			//...assign that data to local variables to be displayed.
			$id = $row['projectID'];
			$title = $row['projectTitle'];
			$description = $row['projectDescription'];
			$startDate = $row['startDate'];
			$date = $row['date'];
	?>

	<!-- List all Completed ToDo Projects and the Date they were completed -->
	<ul>
		<li><a href="completedDetails.php?id=<?php echo $id?>"><?php echo $title ?></a></li>
		<?php echo "<b>Start Date: </b> $startDate"; ?>
		<?php echo "<b>Finished Date: </b> $date"; ?>
	</ul>
	<?php
		}
	}
?>

	<br>
	<button class="button"><a href="index.php">View To Do List</a></button>
	
</body>
</html>