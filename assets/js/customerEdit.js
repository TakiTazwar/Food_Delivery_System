function validateAll() {
	var password=validatePassword();
	var name=validateName();
	
	var phone=validatePhone();
	var address=validateAddress();
	var nid=validateNID();
	var area=validateArea();

	
	if(password &&  name &&
		phone && address && nid && area)
	{
		return true;

	}
	else
	{
		return false;
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

function removeDOB()
{
	document.getElementById('dobmsg').innerHTML="";
}