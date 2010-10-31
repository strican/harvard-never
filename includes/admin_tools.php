<?
	$qmax = 0;
	$qlast = 0;

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


	/*
	 * void
	 * get_post($id)
	 *
	 * Gets post with message_id $id and outputs the html for it
	 */
	function get_queue_post($id)
	{
		global $mysqli;

	    // escape username and password for safety
	    $id = mysql_real_escape_string($id);

		// prepare SQL
		$sql = "SELECT message, sex, class, time FROM moderator WHERE message_id=?";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$stmt->execute();
		$stmt->bind_result($message, $sex, $class, $time);
		
		// if we found a row, remember user and redirect to portfolio
		while ($stmt->fetch())
		{
?>
						<tr>
							<td class="posthorzpadding"></td>
							<td  class="postdisplay">
								<font size="1">Posted <? echo $time ?> by a <? echo $class ?> <? echo ($sex == "M") ? "male" : "female" ?>.</font>
								<br/><br/>
								<? echo $message ?> <br/><br/>
								<form >
									<input class="responsebutton" type="submit" value="Approve" />&nbsp;&nbsp;&nbsp;
									<input class="responsebutton" type="submit" value="Reject" />
							  	</form>
							<td/>
							<td class="posthorzpadding"></td>
						</tr>
						<tr>
							<td height="0" colspan="3"></td>
						</tr>
<?
			return true;
		}

		// else report error
//		apologize("There was an error. Please try again in a few minutes.");
		return false;

	}

	function set_queue_max()
	{
		global $qmax, $mysqli;

		// prepare SQL
		$sql = "SELECT max(message_id) FROM moderator";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
//		$stmt->bind_param("i", $id);
		
		// execute query
		$stmt->execute();
		$stmt->bind_result($qmax);

		if ($stmt->fetch())
			return;

		apologize("There was an error. Please try again in a few minutes.");
	}

	function display_queue()
	{
		global $qmax, $qlast, $mysqli;
		if ($qlast == 0)
		{
			set_queue_max();
			$qlast = $qmax;
		}

		for ($i = $qlast, $count = 0; $count < RESULTS_PER_PAGE && $i > 0; $count++)
		{
			if (!get_queue_post($i))
				$count--;
			
			$i--;
			$qlast = $i;
		}
		
		
	}

?>
