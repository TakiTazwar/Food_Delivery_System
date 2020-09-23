function validateAll() {
	var name=validateName();
	var price=validatePrice();
	var discount=validateDiscount();
	var type=validateType();



	if(name && price && discount && type )
	{
		return true;

	}
	else
	{
		return false;
	}
}

function validateName() {
	var name=document.getElementById('item_name').value;
	if(name!="")
	{
		document.getElementById('itemMsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('itemMsg').innerHTML="Item name cannot be empty";
		return false;	
	}
	
}

function validatePrice() {
	var price=document.getElementById('price').value;
	if(price!="")
	{
		document.getElementById('priceMsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('priceMsg').innerHTML="Price cannot be empty";
		return false;	
	}
}

function validateDiscount() {
	var discount=document.getElementById('discount').value;
	if(discount!="")
	{
		document.getElementById('discountMsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('discountMsg').innerHTML="Discount name cannot be empty";
		return false;	
	}
	
}

function validateType() {
	var type=document.getElementById('type').value;
	if(type!="")
	{
		document.getElementById('typeMsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('typeMsg').innerHTML="Type cannot be empty";
		return false;	
	}	
}
