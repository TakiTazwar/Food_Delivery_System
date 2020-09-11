function validateAll() {
	var userName=validateUserName();
	var password=validatePassword();


	if(userName && password )
	{
		return true;

	}
	else
	{
		return false;
	}
}

function validateUserName() {
	var userName=document.getElementById('username').value;
	if(userName!="")
	{
		document.getElementById('usernamemsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('usernamemsg').innerHTML="User name cannot be empty";
		return false;	
	}
	
}

function validatePassword() {
	var password=document.getElementById('password').value;
	if(password!="")
	{
		document.getElementById('passwordmsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('passwordmsg').innerHTML="Password cannot be empty";
		return false;	
	}
}