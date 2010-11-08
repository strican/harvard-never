<?
	require_once("common.php");

	/*
	 * void
	 * get_post($id)
	 *
	 * Gets post with message_id $id and outputs the html for it
	 */
	function get_post($id)
	{
		global $mysqli;

	    // escape username and password for safety
	    $id = mysql_real_escape_string($id);

		// prepare SQL
		$sql = "SELECT message, sex, class, time, yes, no FROM posts WHERE message_id=?";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$stmt->execute();
		$stmt->bind_result($message, $sex, $class, $time, $yes, $no);
		
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
								<form>
									<input class="responsebutton" type="submit" value="Me neither..." />&nbsp;&nbsp;&nbsp;
									<input class="responsebutton" type="submit" value="I have!" />
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

//			echo "						<tr>";
//			echo "							<td class=\"posthorzpadding\"></td>";
//			echo "							<td  class=\"postdisplay\">";
//			echo "								<font size=\"1\">Posted October 23, 2010 at 4:27pm by a junior male.</font>";
//			echo "								<br/><br/>";
//			echo "								Never have I ever... slept with Brian Plancher. <br/><br/>";
//			echo "								<form>";
//			echo "									<input class=\"responsebutton\" type=\"submit\" value=\"Me neither...\" />&nbsp;&nbsp;&nbsp;";
//			echo "									<input class=\"responsebutton\" type=\"submit\" value=\"I have!\" />";
//			echo "							  	</form>";
//			echo "							<td/>";
//			echo "							<td class=\"posthorzpadding\"></td>";
//			echo "						</tr>";

		// else report error
//		apologize("There was an error. Please try again in a few minutes.");
		return false;

	}

	function set_max()
	{
		global $max, $mysqli;

		// prepare SQL
		$sql = "SELECT max(message_id) FROM posts";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
//		$stmt->bind_param("i", $id);

		// execute query
		$stmt->execute();
		$stmt->bind_result($max);

		if ($stmt->fetch())
			return;

		apologize("There was an error. Please try again in a few minutes.");
	}

	function display_posts()
	{
		global $max, $last, $mysqli;
		if ($last == 0)
		{
			set_max();
			$last = $max;
		}

		for ($i = $last, $count = 0; $count < RESULTS_PER_PAGE && $i > 0; $count++)
		{
			if (!get_post($i))
				$count--;
			
			$i--;
			$last = $i;
		}
		
		
	}

?>
