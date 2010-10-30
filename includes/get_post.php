<?
	/*
	 * void
	 * get_post($id)
	 *
	 * Gets post with message_id $id and outputs the html for it
	 */
	function get_post($id, $mysqli)
	{
		// prepare SQL
		$sql = "SELECT * FROM users WHERE message_id=?";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$stmt->execute();
		$stmt->bind_result($uid);
		
		// if we found a row, remember user and redirect to portfolio
		while ($stmt->fetch())
		{
			echo "						<tr>";
			echo "							<td class=\"posthorzpadding\"></td>";
			echo "							<td  class=\"postdisplay\">";
			echo "								<font size=\"1\">Posted October 23, 2010 at 4:27pm by a junior male.</font>";
			echo "								<br/><br/>";
			echo "								Never have I ever... slept with Brian Plancher. <br/><br/>";
			echo "								<form>";
			echo "									<input class=\"responsebutton\" type=\"submit\" value=\"Me neither...\" />&nbsp;&nbsp;&nbsp;";
			echo "									<input class=\"responsebutton\" type=\"submit\" value=\"I have!\" />";
			echo "							  	</form>";
			echo "							<td/>";
			echo "							<td class=\"posthorzpadding\"></td>";
			echo "						</tr>";

			exit;
		}

		// else report error
		apologize("There was an error. Please try again in a few minutes.");

	}

?>
