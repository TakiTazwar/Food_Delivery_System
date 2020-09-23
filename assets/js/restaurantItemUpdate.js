function validate()
{
	var id=document.getElementById('id').value;
	var itemName=document.getElementById('item_name').value;
	var price=document.getElementById('price').value;
	var discount=document.getElementById('discount').value;
	var type=document.getElementById('type').value;

	var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/restaurantItemUpdateCheck.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('id='+id+'&item_name='+itemName+'&price='+price+'&discount='+discount+'&type='+type);
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