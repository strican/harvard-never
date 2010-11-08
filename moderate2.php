<?

    // require common code
    require_once("includes/common.php"); 
	require_once("includes/admin_tools.php");

	$id = mysql_real_escape_string($_POST["number"]);
    $choice = mysql_real_escape_string($_POST["choice"]);

    // Check which action to take
	if ($choice == "Approve")
		approve($id);

	if ($choice == "Reject")
		reject($id);

	if ($choice == "Pass")
		pass($id);

?>
