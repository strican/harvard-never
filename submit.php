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
     <center>
       <div>
	<table id="main_table" border="0" cellpadding="0" cellspacing="0" spacing="0" width="100%" bgcolor="#FFFFFF">     
          <tr>
	    <td id="contact_area" valign="top" align="center" colspan="4" rowspan="2" width="700px">
	      

<br/><br/><br/><br/>
<form action="submit2" method="post">
  <table id="submit_form">
    <tr>
      <td colspan="3" align="left">
        Peter fill in.
      </td>
    </tr>
    <tr>
      <td colspan="3" align="left" id="submit_header">
        &nbsp;NEVER HAVE I EVER...
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center">
        <textarea name="message" id="message_area"></textarea><br/><br/>
      </td>
    </tr>
    <tr>
      <td valign="top" width ="110px">
	Gender: <br/>
        <input type="radio" name="sex" value="M" /> Male <br/>
        <input type="radio" name="sex" value="F" /> Female <br/>
      </td>
      <td valign="top" width="130px">
	Class: <br/>										  
	<input type="radio" name="class" value="freshman" /> Freshman <br/>
  	<input type="radio" name="class" value="sophomore" /> Sophomore <br/>
      </td>
      <td valign="top" width="100px">
        <br/>
	<input type="radio" name="class" value="junior" /> Junior <br/>
	<input type="radio" name="class" value="senior" /> Senior <br/>
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center"><br/><input id="newpostbutton" type="submit" name="newpost" value="Submit"></td>
    </tr>
  </table>
</form>


	    </td>
						
	    <td id="welcomemessage" valign="top">
              <form align="right"><input type="text" /><br/><input type="submit" value="Search Posts" /></form><br/><br/>
                                Welcome to Never Have I Ever - Harvard edition.<br/><br/>

                                You know the game, now play it with the whole school! Find out how many of your peers have done the crazy things you haven't!<br/><br/>
                                Click <a href="submit.html" style="color: #0000FF; text-decoration:underline">here<a/> to submit a post.</br>
                                Follow us on Twitter: HarvardHasNever<br/><br/><br/><br/>
            </td>
	  </tr>
</table>
</div>
</center>
 

	<?
		include("includes/footer.php");
	?>

  </body>
</html>

