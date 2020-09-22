function review(reciever,orderid)
{
	var message=document.getElementById('reviewText').value;
	if(message!="")
	{
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/customerReview.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('reciever='+reciever+'&orderid='+orderid+'&message='+message);
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
	else
	{
		document.getElementById('show').innerHTML="Review Cannot be Empty";
		
	}
}