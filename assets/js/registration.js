function validateAll() {
	var userName=validateUserName();
	var password=validatePassword();
	var confirm=validateConfirmPassword();
	var name=validateName();
	var dob=validateDOB();
	var email=validateEmail();
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
		document.getElementById('namemsg').innerHTML="";
		return true;
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
		document.getElementById('emailmsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('emailmsg').innerHTML="Email cannot be empty";
		return false;	
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