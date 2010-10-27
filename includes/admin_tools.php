<?
	function isadmin($uid, $mysqli)
	{
		// Prepared statment to be used
	    $stmt = mysqli_stmt_init($mysqli);

		// Get the user's admin bit
        $sql = "SELECT admin FROM users WHERE uid=?";
        $stmt->prepare($sql);
        $stmt->bind_param("s", $uid);
        
        // Execute query
        $stmt->execute();
        $stmt->bind_result($value);
        $stmt->fetch();

		return $value;	
	}
?>
