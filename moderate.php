<?
	require_once("includes/common.php");
	require_once("includes/admin_tools.php");

	authenticate();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Never Have I Ever Harvard.</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	<script type="text/javascript" src="script/utilities.js"></script>

	
	<? 
		generate_queue();
		generate_mod_script();
	?>

  </head>
  <body>

<?
	include("includes/header.php");
?>

<center>
	<div>
		<table>
			<tr>
				<td colspan="6" height = "10"></td>
			</tr>
			<tr>
				<td valign="top" colspan="4" rowspan="2" width="700px">
					<table width="700px" cellpadding="20px">
					<? 
						display();
					?>
					</table>
				</td>
						
			</tr>
</table>
</div>
</center>

<?
	include("includes/footer.php");
?>

	</body>
</html>
