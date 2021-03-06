function moderator_lock(id)
{
	var a_name = id + "a";
	var r_name = id + "r";
	var p_name = id + "p";

	document.getElementById(a_name).disabled = "disabled";
	document.getElementById(r_name).disabled = "disabled";
	document.getElementById(p_name).disabled = "disabled";
	
}

function vote_lock(id)
{
	var y_name = id + "y";
	var n_name = id + "n";

	document.getElementById(y_name).disabled = "disabled";
	document.getElementById(n_name).disabled = "disabled";
}

//GLOBAL VARIABLES

var gender;
var year;
     
/*
 *void
 *initialize()
 *
 *runs when index.php has loaded
 *loads gender and year cookies if they exist, if not displays the demographics form
 */
function initialize()
{
  checkCookie();
}

/*
 * Utilities for keeping cookies
 * Adapted from w3schools
 */
function getCookie(c_name)
{
  if (document.cookie.length>0)
  {
    c_start=document.cookie.indexOf(c_name + "=");
    if (c_start!=-1)
    {
      c_start=c_start + c_name.length+1;
      c_end=document.cookie.indexOf(";",c_start);
      if (c_end==-1) c_end=document.cookie.length;
      return unescape(document.cookie.substring(c_start,c_end));
    }
  }
  return "";
}

function setCookie(c_name,value,expiredays)
{
  var exdate=new Date();
  exdate.setDate(exdate.getDate()+expiredays);
  document.cookie=c_name+ "=" +escape(value)+
  ((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}

/*
 * void
 * checkCookie()
 *
 * checks if cookies exist for gender and year
 * if not displays the demographics form
 */
function checkCookie()
{
  gender = getCookie('gender');
  year = getCookie('year');
  if(gender!="" && gender!=null && year!="" && year!=null)
  {
    hideDemographics();
  }
}

//DEMOGRAPHICS FORM FUNCTIONS

/*
 *void
 *hideDemographics()
 *
 *hides the demographics form
 */
function hideDemographics()
{
  var index1 = document.getElementById("demographics_form").rowIndex;
  document.getElementById("main_table").deleteRow(index1);
  var index2 = document.getElementById("demographics_bottom").rowIndex;
  document.getElementById("main_table").deleteRow(index2);
}

/*
 * void
 * submitInfo()
 *
 * sets values for globals year and gender
 * saves the values in cookies
 */
function submitInfo()
{
  if(document.getElementById("dem_male").checked==true)
    gender = "male";
  else if(document.getElementById("dem_female").checked==true)
    gender = "female";
  else
  {
    alert("Please select your gender.");
    return;
  }
  if(document.getElementById("dem_freshman").checked==true)
    year =  2014;
  else if(document.getElementById("dem_sophomore").checked==true)
    year =  2013;
  else if(document.getElementById("dem_junior").checked==true)
    year =  2012;
  else if(document.getElementById("dem_senior").checked==true)
    year = 2011;
  else
  {
    alert("Please select your class year.");
    return;
  }
  setCookie("gender",gender,7);
  setCookie("year",year,7);
  hideDemographics();
}

//RESPONSE BUTTON FUNCTIONS




//MISCELLANEOUS FUNCTIONS

/*
 *void
 *hide(s)
 *
 *hides the element whose id element value is the argument
 */
function hide(s)
{
  document.getElementById(s).style.visibility = "hidden";
}

/*
 *void
 *show(s)
 *
 *shows the element whose id element value is the argument
 */
function show(s)
{
  document.getElementById(s).style.visibility = "visible";
}

function hideAllInfo()
{
  hide('info1');
}


/***************************************************************
 * End of Cookie utilities
 ***************************************************************/

/***************************************************************
 * Next page AJAX functions
 ***************************************************************/
/*
function page(pg)
{
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}	

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("main_posts").innerHTML = xmlhttp.responseText;
		}

		
	}

	xmlhttp.open("GET", "page.php?pg=" + pg);
	xmlhttp.send();
}
*/
