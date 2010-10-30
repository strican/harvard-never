<?
	require_once("includes/common.php");
	require_once("includes/get_post.php");
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
				<td><? get_post(0, $mysqli); ?></td>
			</tr>
			<tr>
				<td valign="top" colspan="4" rowspan="2" width="700px">
					<table width="700px" cellpadding="20px">
						<tr>
							<td class="posthorzpadding"></td>
							<td  class="postdisplay">
								<font size="1">Posted October 23, 2010 at 4:27pm by a junior male.</font>
								<br/><br/>
								Never have I ever... slept with Brian Plancher. <br/><br/>
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
						<tr>
							<td class="posthorzpadding"></td>
							<td  class="postdisplay">
								<font size="1">Posted October 23, 2010 at 4:27pm by a junior male.</font><br/><br/>
											   Never have I ever... slept with Brian Plancher. <br/><br/>
								<form>
								    <input class="responsebutton" type="submit" value="Me neither..." />&nbsp;&nbsp;&nbsp;
								  	<input class="responsebutton" type="submit" value="I have!" />
							  	</form>
							</td>
							<td class="posthorzpadding"></td>
						</tr>
					</table>
				</td>
						
			    <td id="welcomemessage">
						
							  Welcome to Never Have I Ever - Harvard edition.<br/><br/>

                You know the game, now play it with the whole school! Find out how many of your peers have done the crazy things you haven't!
                follow us on Twitter: HarvardHasNever<br/><br/><br/><br/>
							
				  	</td>
			  <tr>
		  		<td valign="top" id="rightcolumn" width="200px">
						  <b><font size="4">Never Have I ever...</font></b></br>
							<form action="submit2" method="post">
						  		  <textarea name="message" id="messagearea"></textarea><br />
					  				<table cellpadding="5px">
									  <tr>
										  <td valign="top" width ="68px">
										  	  Gender: <br/>
								  <input type="radio" name="sex" value="M" /> Male <br/>
									<input type="radio" name="sex" value="F" /> Female <br/>
											</td>
							  					<td valign="top" width="92px">
							  					  Class: <br/>										  
						  							<input type="radio" name="class" value="freshman" /> Freshman <br/>
					  								<input type="radio" name="class" value="sophomore" /> Sophomore <br/>
													<input type="radio" name="class" value="junior" /> Junior <br/>
													<input type="radio" name="class" value="senior" /> Senior <br/>
											  	</td>
											</tr>
									  		<tr>
								   			  <td colspan="2" align="center"><input id="newpostbutton" type="submit" name="newpost" value="Submit"><br/><br/><br/><br/></td>
								 				</tr>
							 				</table>
							 </form>

		  				</td>
						</tr>
					</tr>
</table>
</div>
</center>

<?
	include("includes/footer.php");
?>

	</body>
</html>
