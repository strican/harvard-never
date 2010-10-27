<?
    // require common code
    require_once("includes/common.php");
?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>C$50 Finance: Change Password</title>
  </head>

  <body>

	<?
		include("includes/header.php");
	?>

    <div align="center">
      <form action="changepass2.php" method="post">
        <table border="0">
          <tr>
            <td class="field">Old Password:</td>
            <td><input name="old" type="password" /></td>
          </tr>
          <tr>
            <td class="field">New Password:</td>
            <td><input name="new" type="password" /></td>
          </tr>
          <tr>
            <td class="field">Retype New Password:</td>
            <td><input name="new2" type="password" /><td>
          </tr>
        </table>
        <div style="margin: 10px;">
          <input type="submit" value="Change" />
        </div>
        <div style="margin: 10px;">
          or <a href="index.php">return</a> to your portfolio.
        </div>
      </form>
    </div>

	<?
		include("includes/footer.php");
	?>

  </body>

</html>
