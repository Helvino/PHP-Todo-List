<?php

	require_once 'db_connect.php';

	// initialize errors variable
	$errors = "";


	//if submit button is pressed...
	if(isset($_POST['submit'])){

		//...assign project data to local variables...
		$title = $_POST['projectTitle'];
		$description =$_POST['projectDescription'];

		//...establish connection to mySQL db...
		db();
		global $link;

		//...submit Insert query to db and create a new Project
		$query = "INSERT INTO ToDo(projectTitle, projectDescription, date) VALUES ('$title', '$description', now())";
		$addProj = mysqli_query($link, $query); //use local variable to check if communication with the server was successful.
		if($addProj){
			echo "A new project has been Added.";
		}
		else{
			echo mysqli_error($link);
		}
	}
?>


<html>
<head>
	<title>Add Project</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<h1 id="title">Add Project:</h1>
	<hr>
	<!-- Get Project information from user -->
	<form method="post" action="addProject.php">
		<p id="description">To Do Title: </p>
		<input class="textarea" type="text" name="projectTitle">
		<p id="description">To Do Description: </p>
		<input class="textarea" type="text" name="projectDescription">
		<br>
		<input type="submit" name="submit" value="Add Project">
	</form>

	<?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
	<?php } ?>

	<br>
	<button class="button"><a href="index.php">View To Do List</a></button>

</body>
</html>