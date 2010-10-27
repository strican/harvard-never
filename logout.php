<?

    // require common code
    require_once("includes/common.php"); 

    // log out current user (if any)
    logout();

?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>Never Have I Ever...HARVARD: Log Out</title>
  </head>

  <body>

    <?
		include("includes/header.php");
    ?>

    <div align="center">
      <a href="index.php"><img alt="C$50 Finance" border="0" src="images/logo.gif" /></a>
    </div>

    <div align="center">
      Thank you!
      <br /><br />
      <a href="login.php">Log in</a> again
    </div>

    <?
		include("includes/footer.php");
    ?>

  </body>

</html>

