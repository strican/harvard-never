<?

    // require common code
    require_once("includes/common.php");
	require_once("includes/admin_tools.php");

	authenticate();

	global $mysqli;
    $db = mysql_real_escape_string($_POST["db"]);
	$sql = "INSERT INTO " . $db . " (message, sex, class) VALUES (?, ?, ?)";
	
	for ($i = 0; $i < 50; $i++)
	{
		// randomly generate message, sex, and class
		$message = rand_str(5);
		$sex = rand(0, 1) ? "M" : "F";
	
		switch(rand(0, 3))
		{
			case 0:
				$class = "freshman";
				break;

			case 1:
				$class = "sophomore";
				break;

			case 2:
				$class = "junior";
				break;

			case 3:
				$class = "senior";
				break;
		}

		// Test if input is valid
		if ($message == "")
		    apologize("Please enter a message.");
		
		if ($sex == "")
		    apologize("Please provide your sex.");
		
		if ($class == "")
		    apologize("Please provide your class information.");
		
		// prepare SQL
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("sss", $message, $sex, $class);
		
		// execute query
		$success = $stmt->execute();

		// if insert failed, there is already a user with that username
		if (!$success)
		{
		    // redirect to confirmation page
		    apologize("We're sorry. Something went wrong.");
		}
	}
    
    redirect("admin.php");

?>
