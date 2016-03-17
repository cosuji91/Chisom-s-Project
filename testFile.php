<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Chisom's Test Project</h1>
		<?php
    		$host = "10.72.6.126";
    		$user = "ub3a3424c4b8d400d9b6ae55e40a94958";
    		$password = "0b67295230e24f0ba68e824a5a17e1c4";
    		$dbname = "chisomdb";
    		echo $_POST['name'] . " " . $_POST['sso'];
    		if (isset($_POST['submit']))
    		{
				$connection = pg_connect("host=$host dbname=$dbname user=$user password=$password)
					or die ("Could not connect to server\n");
				$name = $_POST['name'];
				$sso = $_POST['sso'];
				$query = "INSERT INTO Employees VALUES (NULL, '$name', '$sso')";
				pg_query($connection, $query) or die ("Cannot execute query: $query\n");
				if (pg_query($connection, $query) === TRUE)
					echo "<p><span style=\"color: red;\">Thank you. Your comments have been entered in my database. "
				. "DO NOT REFRESH THE PAGE or the data will be sent again.</span></p>";
				pg_close($connection);
			}
		?>
	</body>
	<form id ="form1" method="post" action="testFile.php">
		<fieldset>
			<legend>Enter your name and SSO</legend>
			<label for="name">
				<span>Name:</span>
				<input id="name" type="text" name="name" size="50"/>
			</label>
			<label for="sso">
    	    	<span>SSO:</span>
    	    	<input id="sso" type="number" name="sso" size="9"/>
    	    </label>
			<label for="reset1" id="reset"><span>&nbsp;</span>
    	    	<input id="reset1" class="reset" type="reset" name="reset"/>
    	    </label>
			<label for="submit1" id="submit"><span>&nbsp;</span>
    	    	<input id="submit1" class="submit" type="submit" name="submit" value="Submit"/>
    	    </label>
		</fieldset>
	</form>
</html>


