<?php

require_once("db_connect.php"); ?>

<html>

<head>
	<title>Project ToDo List</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>

	<h1 id="title">List of my To-do's</h1>
	<hr>
	<button class="button"><a href="addProject.php">Add a task</a></button>
	<button class="button"><a href="completedProjects.php">View Completed Todo's</a></button>
	<h3>My To-do's:</h3>

	<div class="tasks">

	<?php
		db();
		global $link;  //establish connection with db_connect.php $link
	
		$query = "SELECT projectID, projectTitle, projectDescription, date FROM ToDo"; //query for mySQL
		$selectProj = mysqli_query($link, $query);	//submit query using (mySQL connection, mySQL query)
	
		//If there is at least 1 record found...
		if(mysqli_num_rows($selectProj) >= 1){
			//...and while there are records remaining...
			while($row = mysqli_fetch_array($selectProj)){
				//...store the data in local variables.
				$id = $row['projectID'];
				$title = $row['projectTitle'];
				$description = $row['projectDescription'];
				$date = $row['date'];
	?>
	
	<!-- List all Open ToDo Projects and the Date they were created -->
	<ul>
		<li>
			<h2 id="date"><?php echo " $date" ?></h2>
			<h1 id="test1"><a href="projectDetails.php?id=<?php echo $id?>"><?php echo $title ?></a></h1>
			<p id="description"><?php echo " $description" ?></p>
			<hr>
		</li>
	</ul>
	
	<?php
		}
	}
	?> <!-- Close php if and while loops -->

	</div>
	
</body>
</html>