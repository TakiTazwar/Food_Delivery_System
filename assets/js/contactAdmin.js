function reloadPage() 
{
	var foodtype = document.getElementById('foodtype').value;
	var area = document.getElementById('area').value;
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../views/customerContact.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('foodtype='+foodtype+'&area='+area);
	xhttp.onreadystatechange = function()
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
	document.getElementById('show').innerHTML = "";	
}

function validateMessage() {
	var message = document.getElementById('message').value;
	if(message!="")
	{
		return true;
	}
	else
	{
		document.getElementById('show').innerHTML="Message Cannot be Empty";
		return false;
	}
	
}