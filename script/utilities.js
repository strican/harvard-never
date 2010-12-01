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


/*
 * Code from index.php
 * 
 * Utilities for keeping cookies
 */
var gender;
var year;
     
function initialize()
{
  hideAllInfo();
  checkCookie();
}
function hideAllInfo()
{
  hide('info1');
}
function hide(s)
{
  document.getElementById(s).style.visibility = "hidden";
}
function show(s)
{
  document.getElementById(s).style.visibility = "visible";
}
function hideDemographics()
{
  var index1 = document.getElementById("demographics_form").rowIndex;
  document.getElementById("main_table").deleteRow(index1);
  var index2 = document.getElementById("demographics_bottom").rowIndex;
  document.getElementById("main_table").deleteRow(index2);
}

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

//Cookie handling code
//Adapted from w3schools
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

function checkCookie()
{
  gender = getCookie('gender');
  year = getCookie('year');
  if(gender!="" && gender!=null && year!="" && year!=null)
  {
    hideDemographics();
  }
}


/***************************************************************
 * End of Cookie utilities
 ***************************************************************/

/***************************************************************
 * Next page AJAX functions
 ***************************************************************/
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
