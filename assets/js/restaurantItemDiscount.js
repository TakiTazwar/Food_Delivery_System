



function validateName()
{
	var id=document.getElementById('id').value;
	var discount=document.getElementById('discount').value;
	var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/restaurantDiscountCheck.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('id='+id+'&discount='+discount);
		xhttp.onreadystatechange = function ()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				if(this.responseText != "")
				{
					document.getElementById('insert').innerHTML = this.responseText;

				}
				else
				{
					document.getElementById('insert').innerHTML = "";
				}
				
			}
		}
			

}

