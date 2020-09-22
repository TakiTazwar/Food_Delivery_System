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

function validateAllNew()
{
	var username=document.getElementById('username').value;
	var password=document.getElementById('password').value;
	
	//AJAX
	xhttp.open('POST', '../php/logCheck.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('username='+username+'&password='+password);
	xhttp.onreadystatechange = function ()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			if(this.responseText != "")
			{
				document.getElementById('show').innerHTML = this.responseText;
				//alert(this.responseText);
			}
			else
			{
				document.getElementById('show').innerHTML = "";
			}
			
		}	
	}
}