<?
	require_once("common.php");

	$qmax = 0;
	$qlast = 0;
	$count = 0;
	$ids;


	/*
	 * void
	 * get_post($id)
	 *
	 * Gets post with message_id $id and outputs the html for it
	 */
	function check_post($id)
	{
		global $mysqli, $ids, $count, $used;

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
		
		// if we found a row, remember id and display
//		static $i = 0;
		while ($stmt->fetch())
		{
			$ids[$count] = $id;
			$used++;
//			$i++;

			return true;
		}
		
		return false;
	}




	/*
	 * void
	 * get_post($id)
	 *
	 * Gets post with message_id $id and outputs the html for it
	 */
	function get_post($id)
	{
		global $mysqli, $ids;

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
									<input id="<?= $i.'n' ?>" onclick="vote_lock(<?= $i ?>)" class="responsebutton" name="choice" type="submit" value="Me neither..." />&nbsp;&nbsp;&nbsp;
									<input id="<?= $i.'y' ?>" onclick="vote_lock(<?= $i ?>)" class="responsebutton" name="choice" type="submit" value="I have!" />
							  	</form>
							<td/>
							<td class="posthorzpadding"></td>
						</tr>
						<tr>
							<td height="60px" colspan="3"></td>
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

	function generate_posts()
	{
		global $max, $last, $mysqli, $count;
		if ($last == 0)
		{
			set_max();
			$last = $max;
		}

		for ($i = $last, $count = 0; $count < RESULTS_PER_PAGE && $i > 0; $count++)
		{
			if (!check_post($i))
				$count--;
			
			$i--;
			$last = $i;
		}
		
	}

	function display_posts()
	{
		global $count, $ids;
		for ($i = 0; $i < $count; $i++)
		{
			get_post($ids[$i]);
		}	
	}


	function generate_script()
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
			"			$.post('vote.php', $('#$j').serialize(), function(data) {});\n" .
			"		}\n" .
			"	});\n" .
			"});\n";
		}
		echo "	</script>\n";
	}

	function no($id)
	{
		global $mysqli;

	    // escape username and password for safety
	    $id = mysql_real_escape_string($id);

		// prepare SQL
		$sql = "UPDATE posts SET no = no + 1 WHERE message_id=?";
	
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$success = $stmt->execute();

		
		// if we found a row, remember id and display
		if (!$success)
		{
			apologize("We're sorry. Something went wrong");
		}

	}
	

	function yes($id)
	{
		global $mysqli;

	    // escape username and password for safety
	    $id = mysql_real_escape_string($id);

		// prepare SQL
		$sql = "UPDATE posts SET yes = yes + 1 WHERE message_id=?";
	
		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);
		$stmt->bind_param("i", $id);

		// execute query
		$success = $stmt->execute();

		
		// if we found a row, remember id and display
		if (!$success)
		{
			apologize("We're sorry. Something went wrong");
		}

	}

	function find_page($pg)
	{
		global $page;

		for (; $page < $pg; $page++)
			generate_posts();
		
		generate_script();
	}

	function get_total()
	{
		global $total, $mysqli;

		// prepare SQL
		$sql = "SELECT count(message_id) FROM posts";

		$stmt = mysqli_stmt_init($mysqli);
		$stmt->prepare($sql);

		// execute query
		$stmt->execute();
		$stmt->bind_result($total);

		if ($stmt->fetch())
			return;

	
		apologize("There was an error. Please try again in a few minutes.");	

	}

	function page_choice()
	{
		global $page, $total, $used;

		// Get the total number of posts
		get_total();

		$list_first;			// First page number in page menu
		$list_last;				// Last page number in page menu
		
		// If within the first three, start at page 1
		if ($page <= 3)
			$list_first = 1;

		// Else, start from 2 before current
		else
			$list_first = $page - 2;

		// Number of pages left
		$left = intval((floatval($total - $used) / RESULTS_PER_PAGE) + 1);
		$last = $page + $left;

		// If not within last three, end at two after current
		if ($left > 2)
			$list_last = $page + 2;

		// If within the last three, end at last page #
		else
			$list_last = $last;

		// If range is is less than 5, add pages as appropriate
		while ($last >= 4 && ($list_last - $list_first) < 4)
		{
			// If there is room for additional page options at front
			if ($list_first != 1)
			{
				$list_first--;
				continue;
			}

			if ($list_last != $last)
			{
				$list_last++;
				continue;
			}

			break;
		}

		// First option
?>
			<tr>
				<td><a href="index.php?pg=1" style="color: #0000FF; text-decoration:underline">First</a></td>

<?
		// Each page option in determined range
		for ($i = $list_first; $i <= $list_last; $i++)
		{
?>
				<td><a href="index.php?pg=<? echo $i ?>" style="color: #0000FF; text-decoration:underline"><? echo $i ?></a></td>
<?
		}

		// Last option
?>
				<td><a href="index.php?pg=<? echo ($page + $left) ?>" style="color: #0000FF; text-decoration:underline">Last</a></td>
			</tr>
<?
	}



?>
