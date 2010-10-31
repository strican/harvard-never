<?
	require_once("includes/common.php");
	require_once("includes/admin_tools.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Never Have I Ever Harvard.</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
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
						display_queue();
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
