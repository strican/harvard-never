<?

    // require common code
    require_once("includes/common.php");
	require_once("includes/admin_tools.php");

    // require authentication for admin page
	if(preg_match("/admin.php$/", $_SERVER["PHP_SELF"]))
	{
        if (!isset($_SESSION["uid"]))
            redirect("login.php");

		if (!isadmin($_SESSION["uid"], $mysqli))
			apologize("You are not authorized to have access.");

	}

?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>C$50 Finance: Log In</title>
  </head>

  <body>

	<?
		include("includes/header.php");
	?>

	<p>Welcome to admin interface</p>

	<?
		include("includes/footer.php");
	?>

  </body>

</html>

