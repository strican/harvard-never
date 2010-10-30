<?

    // require common code
    require_once("includes/common.php");

?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <title>Never Have I Ever Harvard: Post a Submission</title>
  </head>

  <body>


	<?
		include("includes/header.php");
	?>

    <div align="center">
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

    </div>

	<?
		include("includes/footer.php");
	?>

  </body>

</html>
