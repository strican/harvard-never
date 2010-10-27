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
    <title>C$50 Finance: Register</title>
  </head>

  <body>

    <div align="center">
      <a href="index.php"><img alt="C$50 Finance" border="0" src="images/logo.gif" /></a>
    </div>

    <div align="center">
      <form action="register2.php" method="post">
        <table border="0">
          <tr>
            <td class="field">Username:</td>
            <td><input name="username" type="text" /></td>
          </tr>
          <tr>
            <td class="field">Password:</td>
            <td><input name="password" type="password" /></td>
          </tr>
          <tr>
            <td class="field">Password Again:</td>
            <td><input name="password2" type="password" /></td>
          </tr>
        </table>
        <div style="margin: 10px;">
          <input type="submit" value="Register" />
        </div>
        <div style="margin: 10px;">
          or <a href="login.php">login</a> if you already have an account.
        </div>
      </form>
    </div>

  </body>

</html>
