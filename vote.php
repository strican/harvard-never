<?

    // require common code
    require_once("includes/common.php"); 
	require_once("includes/get_post.php");

	$id = mysql_real_escape_string($_POST["number"]);
    $choice = mysql_real_escape_string($_POST["choice"]);

    // Check which action to take
	if ($choice == "Me neither...")
		no($id);

	if ($choice == "I have!")
		yes($id);


?>
