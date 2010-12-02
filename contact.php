<?
	require_once("includes/common.php");
	require_once("includes/get_post.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Never Have I Ever Harvard Contact Page.</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="shortcut icon" href="/images/never-icon.gif" type="image/x-icon" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	<script type="text/javascript" src="script/utilities.js"></script>

	<? 
		generate_posts();
		generate_script();
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
  <body>

	<?
		include("includes/header.php");
	?>

     <center>
       <div>
	<table id="main_table" border="0" cellpadding="0" cellspacing="0" spacing="0" width="100%" bgcolor="#FFFFFF">     
          <tr>
	    <td id="contact_area" valign="top" colspan="4" rowspan="2" width="700px">
	    <h1>Questions? Comments? </h1>
	    <h3>We'd love to hear them </h3>
	    <p>Click <a href="mailto:admin@neverhaveiharvard.com?subject=re:Never Have I Harvard"> here </a> to email us. <br> <br>
	    Follow us on <a href="http://twitter.com/#!/NeverHasHarvard"> Twitter! </a> <br> <br>
	    Visit our Facebook page! </p>
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
