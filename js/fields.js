function validPhone(){
	var re = /\d+/;
	var phone = document.getElementById("phone").value;
	var valid = re.test(phone);
	if (valid) alert("dddd");
	else alert("nnnnn");
	return valid;
}

function validUser(){
	var re = /\w+?[\s]?[\w+]/;
	var user = document.getElementById("user").value;
	var valid = re.test(user);
	if (valid) alert("dddd");
	else alert("nnnnn");
	return valid;
}