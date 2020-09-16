function validateAll() {
	var email=validateEmail();
	var userName=validateUserName();
	var password=validatePassword();
	var confirm=validateConfirmPassword();
	var name=validateName();
	var dob=validateDOB();
	
	var phone=validatePhone();
	var address=validateAddress();
	var type=validateType();
	var nid=validateNID();
	var area=validateArea();

	
	if(userName && password && confirm  && name && dob && email && 
		phone && address && type && nid && area)
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
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/userCheck.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('user='+userName);
		xhttp.onreadystatechange = function (){
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					document.getElementById('usernamemsg').innerHTML = this.responseText;
				}
				else
				{
					document.getElementById('usernamemsg').innerHTML = "";
				}
				
			}	
		}
	}
	else
	{
		document.getElementById('usernamemsg').innerHTML="User name cannot be empty";
	}
	if(document.getElementById('usernamemsg').innerHTML!="")
	{
		return false;
	}
	else
	{
		return true;
	}
	
}

function validatePassword() {
	var password=document.getElementById('password').value;	
	if(password!="")
	{
		var len=password.length;
		if(len>3)
		{
			document.getElementById('passwordmsg').innerHTML="";
			return true;
		}
		else
		{
			document.getElementById('passwordmsg').innerHTML="Minimum Password Length 4";
			return false;
		}
	}
	else
	{
		document.getElementById('passwordmsg').innerHTML="Password cannot be empty";
		return false;	
	}
}

function validateConfirmPassword() {
	var password=document.getElementById('password').value;
	var confirmPassword=document.getElementById('confirmpassword').value;
	if(password==confirmPassword && confirmPassword!="")
	{
		document.getElementById('confirmPasswordmsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('confirmPasswordmsg').innerHTML="Both Passwords has to be same";
		return false;	
	}

}

function validateName() {
	var Name=document.getElementById('name').value;
	if(Name!="")
	{
		if((Name[0]>='A' && Name[0]<='Z') ||(Name[0]>='a' && Name[0]<='z'))
		{
			if(Name.split(" ").length>=2)
			{
				var counter=0;
				while(counter<Name.length)
				{
					if(!((Name[counter]>='A' && Name[counter]<='Z') ||(Name[counter]>='a' && Name[counter]<='z') || Name[counter]=='.' || Name[counter]=='-' || Name[counter]==' '))
					{
						document.getElementById('namemsg').innerHTML="Name can only contain A-Z, a-z, . and -";
						return false;
					}
					counter=counter+1;
				}
				document.getElementById('namemsg').innerHTML="";
				return true;
			}
			else
			{
				document.getElementById('namemsg').innerHTML="Name must contain 2 words";
				return false;
			}
		}
		else
		{
			document.getElementById('namemsg').innerHTML="Name must start with a letter";
			return false;
		}
	}
	else
	{
		document.getElementById('namemsg').innerHTML="Name cannot be empty";	
		return false;
	}
}
function validateDOB() {
	var DOB=document.getElementById('dob').value;
	if(DOB!="")
	{
		return true;
	}
	else
	{
		document.getElementById('dobmsg').innerHTML="Date cannot be empty";
		return false;
	}
}
function validateEmail() {
	var email=document.getElementById('email').value;
	if(email!="")
	{
		if(email.split("@").length>=2)
		{
			emailsplit=email.split("@");
			if(emailsplit[1].split(".").length>=2)
			{
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../php/emailCheck.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('email='+email);
				xhttp.onreadystatechange = function (){
					if(this.readyState == 4 && this.status == 200)
					{
						if(this.responseText != "")
						{
							document.getElementById('emailmsg').innerHTML = this.responseText;
						}
						else
						{
							document.getElementById('emailmsg').innerHTML = "";
						}
						
					}	
				}
			}
			else
			{
				document.getElementById('emailmsg').innerHTML="Please enter valid email. .com is missing";
			}
		}
		else
		{
			document.getElementById('emailmsg').innerHTML="Please enter valid email";
		}
		
	}
	else
	{
		document.getElementById('emailmsg').innerHTML="Email cannot be empty";
	}
	if(document.getElementById('emailmsg').innerHTML!="")
	{
		return false;
	}
	else
	{
		return true;
	}
}
function validatePhone() {
	var phone=document.getElementById('phone').value;
	if(phone!="")
	{
		document.getElementById('phonemsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('phonemsg').innerHTML="Phone Number cannot be empty";
		return false;	
	}
}
function validateNID() {
	var NID=document.getElementById('nid').value;
	if(NID!="")
	{
		document.getElementById('nidmsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('nidmsg').innerHTML="NID/LICENSE cannot be empty";
		return false;	
	}
}
function validateAddress() {
	var address=document.getElementById('address').value;
	if(address!="")
	{
		document.getElementById('addressmsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('addressmsg').innerHTML="Address cannot be empty";
		return false;	
	}
}
function validateArea() {
	var area=document.getElementById('area').value;
	if(area!="")
	{
		document.getElementById('areamsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('areamsg').innerHTML="Area cannot be empty";
		return false;	
	}
}
function validateType() {
	var type=document.getElementById('type').value;
	if(type!="")
	{
		return true;
	}
	else
	{
		return false;	
	}
}

function removeDOB()
{
	document.getElementById('dobmsg').innerHTML="";
}