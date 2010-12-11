<?

    // require common code
    require_once("includes/common.php");
	require_once("includes/admin_tools.php");
	

	authenticate();

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

	<a href="moderate.php">Moderate posts</a>
	
	<br />
	<br />

	Populate a database:
	<form id="populate" action="populate.php" method="post">
		<input id="pop_posts" class="responsebutton" type="radio" name="db" value="posts" />Posts <br />
		<input id="pop_moderate" class="responsebutton" type="radio" name="db" value="moderator" />Moderator <br />
		<input type="submit" />
	</form>


	<?
		include("includes/footer.php");
	?>

  </body>

</html>

