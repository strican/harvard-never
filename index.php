<?
	require_once("includes/common.php");
	require_once("includes/get_post.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Never Have I Ever Harvard.</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="shortcut icon" href="/images/never-icon.gif" type="image/x-icon" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	<script type="text/javascript" src="script/utilities.js"></script>

	<? 
		$pg = $_GET["pg"];
		if ($pg == NULL)
			$pg = 1;
		
//		dump($pg);
		find_page($pg);
//		generate_posts();
//		generate_script();
	?>

	<script type="text/javascript">
		/*
		 * Google Analytics Code
		 *
		 ****************************
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-19474758-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		*/
	</script>

  </head>
  <body onload="initialize();">

	<?
		include("includes/header.php");
	?>

     <center>
       <div>
	<table id="main_table" border="0" cellpadding="0" cellspacing="0" spacing="0" width="100%" bgcolor="#FFFFFF">     
          <tr id="demographics_form">
            <td colspan="7">
              <table cellpadding="5px">
	        <tr>
                  <td valign="center" width="300px">
                    <font style="font-size: 1.8em">Please tell us a bit about yourself!</font>
                    <br/>
                    <font style="font-size: .7em">This is simply for data recording purposes and is entirely anonymous.</font>
                  </td>
  		  <td valign="center" width ="120px">
		    Gender: <br/>
      	            <input type="radio" name="sex" value="male" id="dem_male"/> Male <br/>
	            <input type="radio" name="sex" value="female" id="dem_female" /> Female
		  </td>
		  <td valign="center" width="280px">
		    Class: <br/>										  
	            <input type="radio" name="class" value="male" id="dem_freshman"/> Freshman &nbsp;&nbsp;
		    <input type="radio" name="class" value="male" id="dem_sophomore"/> Sophomore <br/>
	  	    <input type="radio" name="class" value="male" id="dem_junior"/> Junior &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  		    <input type="radio" name="class" value="male" id="dem_senior"/> Senior
		  </td>
	          <td colspan="2" valign ="center" align="center" width="200px"><input id="demographicsbutton" type="submit" name="demographics" value="Submit" onclick="submitInfo();">
	          </td>
                </tr>
	      </table>
            </td>
          </tr>

          <tr id="demographics_bottom">
	    <td colspan="7" height="3px"><hr class="dividingline" /></td>
	  </tr>


	  <tr>
	    <td valign="top" colspan="4" rowspan="2" width="700px" border="0" cellpadding="0" cellspacing="0" spacing="0" padding="0">
	      <table width="700px" cellspacing="0px" cellpadding="0px">
                <tr><td height = "20px" colspan ="3"></td></tr>


		</table>
	</div>
<center>

<center>
	<div>
		<table>
			<tr>
				<td colspan="6" height = "10"></td>
			</tr>
			<tr>
				<td valign="top" colspan="4" rowspan="2" width="700px">
					<table id="main_posts" width="700px" cellpadding="20px">

					<?
						display_posts();
					?>
	      </table>
	    </td>
						
	    <td id="welcomemessage" valign="top">
              <form align="right"><input type="text" /><br/><input type="submit" value="Search Posts" /></form><br/><br/>
                                Welcome to Never Have I Ever - Harvard edition.<br/><br/>

                                You know the game, now play it with the whole school! Find out how many of your peers have done the crazy things you haven't!<br/><br/>
                                Click <a href="submit.html" style="color: #0000FF; text-decoration:underline">here<a/> to submit a post.</br>
                                Follow us on Twitter: HarvardHasNever<br/><br/><br/><br/>
            </td>
	  </tr>


			<? page_choice() ?>
<?
	include("includes/footer.php");
?>
</table>
</div>
</center>



</body>
</html>
