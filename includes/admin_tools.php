<?
	$qmax = 0;
	$qlast = 0;
	$count = 0;
	$ids;

	function isadmin($uid)
	{
		global $mysqli;

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
	
	function authenticate()
	{
		// require authentication for admin page
		if(preg_match("/admin.php$/", $_SERVER["PHP_SELF"]))
		{
		    if (!isset($_SESSION["uid"]))
		        redirect("login.php");

			if (!isadmin($_SESSION["uid"]))
				apologize("You are not authorized to have access.");

		}
	}

	/*
	 * void
	 * get_post($id)
	 *
	 * Gets post with message_id $id and outputs the html for it
	 */
	function check_queue_post($id)
	{
		global $mysqli, $ids;

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
		
		// if we found a row, remember id and display
		static $i = 0;
		while ($stmt->fetch())
		{
			$ids[$i] = $id;
			$i++;

			return true;
		}
		
		return false;
	}
	
	function display_queue_posts($id)
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
		
		// if we found a row, remember id and display
		static $i = 0;
		while ($stmt->fetch())
		{
			$i++;
?>
						<tr>
							<td class="posthorzpadding"></td>
							<td  class="postdisplay">
								<font size="1">Posted <? echo $time ?> by a <? echo $class ?> <? echo ($sex == "M") ? "male" : "female" ?>.</font>
								<br/><br/>
								<? echo $message ?> <br/><br/>
								<form id="<?= $i ?>">
									<input style="display:none" name="number" type="hidden" value="<?= $id ?>" />
									<input id="<?= $i.'a' ?>" onclick="moderator_lock(<?= $i ?>)" class="responsebutton" name="choice" type="submit" value="Approve" />&nbsp;&nbsp;&nbsp;
									<input id="<?= $i.'r' ?>" onclick="moderator_lock(<?= $i ?>)" class="responsebutton" name="choice" type="submit" value="Reject" />&nbsp;&nbsp;&nbsp;
									<input id="<?= $i.'p' ?>" onclick="moderator_lock(<?= $i ?>)" class="responsebutton" name="choice" type="submit" value="Pass" />
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

	function generate_queue()
	{
		global $qmax, $qlast, $mysqli, $count;
		if ($qlast == 0)
		{
			set_queue_max();
			$qlast = $qmax;
		}

		for ($i = $qlast; $count < RESULTS_PER_PAGE && $i > 0; $count++)
		{
			if (!check_queue_post($i))
				$count--;
			
			$i--;
			$qlast = $i;
		}
	}

	function display()
	{
		global $count, $ids;
		for ($i = 0; $i < $count; $i++)
		{
			display_queue_posts($ids[$i]);
		}	
	}
	
	function generate_mod_script()
	{	
		global $count;
		echo "	<script type='text/javascript'>\n";
		for ($j = 0; $j < $count; $j++)
		{
		
			echo "$(document).ready(function(){\n" .
			"	$('#$j').validate({\n" .
			"		debug: false,\n" .
			"		rules: {},\n" .
			"		messages: {},\n" .
			"		submitHandler: function(form) {\n" .
			"			$.post('moderate2.php', $('#$j').serialize(), function(data) {});\n" .
			"		}\n" .
			"	});\n" .
			"});\n";
		}
		echo "	</script>\n";
	}

	function approve($id)
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
		
		// if we found a row, remember id and display
		static $i = 0;
		if (!$stmt->fetch())
		{
			apologize("We're sorry. Something went wrong");
		}


		// prepare SQL
		$sql = "INSERT INTO posts (message, sex, class, time) VALUES (?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("ssss", $message, $sex, $class, $time);
		
		// execute query
		$success = $stmt->execute();

		// if insert failed, there is already a user with that username
		
		if (!$success)
		{
			apologize("We're sorry. Something went wrong.");
		}

		// prepare SQL
		$sql = "DELETE FROM moderator WHERE message_id=?";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$success = $stmt->execute();

		// if insert failed, there is already a user with that username
		
		if (!$success)
		{
			apologize("We're sorry. Something went wrong.");
		}


		$uid = mysql_real_escape_string($_SESSION["uid"]);
		$action = "Approve";

		// prepare SQL
		$sql = "INSERT INTO archive (message, sex, class, time, admin_id, action, id) VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("ssssisi", $message, $sex, $class, $time, $uid, $action, $id);

		// execute query
		$success = $stmt->execute();

		if (!$success)
		{
			apologize("We're sorry. We could not record that action.");
		}

	}
	
	function reject($id)
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
		
		// if we found a row, remember id and display
		if (!$stmt->fetch())
		{
			apologize("We're sorry. Something went wrong");
		}

		// prepare SQL
		$sql = "DELETE FROM moderator WHERE message_id=?";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$success = $stmt->execute();

		// if insert failed, there is already a user with that username
		
		if (!$success)
		{
			apologize("We're sorry. Something went wrong.");
		}


		$uid = mysql_real_escape_string($_SESSION["uid"]);
		$action = "Reject";

		// prepare SQL
		$sql = "INSERT INTO archive (message, sex, class, time, admin_id, action, id) VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("ssssisi", $message, $sex, $class, $time, $uid, $action, $id);

		// execute query
		$success = $stmt->execute();

		if (!$success)
		{
			apologize("We're sorry. We could not record that action.");
		}
	}

	function pass($id)
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
		
		// if we found a row, remember id and display
		if (!$stmt->fetch())
		{
			apologize("We're sorry. Something went wrong");
		}


		$uid = mysql_real_escape_string($_SESSION["uid"]);
		$action = "Pass";

		// prepare SQL
		$sql = "INSERT INTO archive (message, sex, class, time, admin_id, action, id) VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("ssssisi", $message, $sex, $class, $time, $uid, $action, $id);

		// execute query
		$success = $stmt->execute();

		if (!$success)
		{
			apologize("We're sorry. We could not record that action.");
		}
	

	}
?>
