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
