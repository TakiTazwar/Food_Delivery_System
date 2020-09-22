function load()
{
	var foodtype = document.getElementById('foodtype').value;
	var area = document.getElementById('area').value;
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/customerSearchFood.php', true);
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

function add(itemid,resid) {
	//alert("item "+itemid);
	//alert("restaurant "+resid);
	var req='request'+itemid;
	var request=document.getElementById(req).value;
	var quan='quantity'+itemid;
	var quantity=document.getElementById(quan).value;
	var spec='specreq'+itemid;
	var specrec=document.getElementById(spec).value;

	if(quantity!="")
	{
			var xhttp = new XMLHttpRequest();
		xhttp.open('POST', '../php/customerAddCart.php', true);
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('itemId='+itemid+'&resid='+resid+'&quantity='+quantity+'&request='+request+'&specrec='+specrec);
		xhttp.onreadystatechange = function ()
		{
		if(this.readyState == 4 && this.status == 200)
		{
			if(this.responseText != "")
			{
				document.getElementById('insert').innerHTML = this.responseText;
				//alert(this.responseText);
			}
			else
			{
				document.getElementById('insert').innerHTML = "";
			}
			
		}	
		}
	}
	else
	{
		document.getElementById('insert').innerHTML = "Quantity cannot be empty";
	}
}