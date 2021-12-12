
// JavaScript Document
function validation()
{
	// Validation of Name:
	title=document.getElementById("title").value;
	if(title=="")
	{
		alert("Please Enter the The Title");
		document.getElementById("title").focus();
		return false;
	}
	tagline=document.getElementById("tagline").value;
	if(tagline=="")
	{
		alert("Please Enter the The Tagline");
		document.getElementById("tagline").focus();
		return false;
	}
	slug=document.getElementById("slug").value;
	if(slug=="")
	{
		alert("Please Enter the The Slug");
		document.getElementById("slug").focus();
		return false;
	}
	content=document.getElementById("content").value;
	if(content=="")
	{
		alert("Please Enter the The Content");
		document.getElementById("content").focus();
		return false;
	}
	author=document.getElementById("author").value;
	if(author=="")
	{
		alert("Please Enter the The Author Name");
		document.getElementById("author").focus();
		return false;
	}
	
}


function contact_validation()
{
	// Validation of Name:
	name=document.getElementById("name").value;
	if(name=="")
	{
		alert("Please Enter the The Name");
		document.getElementById("name").focus();
		return false;
	}
	// Validation of Email:
	email=document.getElementById("email").value;
		if(email=="")
		{
			alert ("Please Enter E-mail ID");
			document.getElementById("email").focus();
			return false;
		}
		// Validation Email must be correct form:
		if(email.indexOf("@") ==-1 || email.lastIndexOf(".")==0 || email.indexOf("@")>email.lastIndexOf("."))
		{
			alert ("Invalid Email // As like milan@gmail.com");
			email=document.getElementById("email").focus();
			return false;
		}
	// Validation of Phone:
	phone_num=document.getElementById("phone_num").value;
	if(phone_num=="")
	{
		alert("Please Enter the The Phone Number");
		document.getElementById("phone_num").focus();
		return false;
	}
	// Validation of Name:
	mes=document.getElementById("mes").value;
	if(mes=="")
	{
		alert("Please Enter the The Message");
		document.getElementById("mes").focus();
		return false;
	}
}
function feedback_validation()
{
	// Validation of Name:
	name=document.getElementById("name").value;
	if(name=="")
	{
		alert("Please Enter the The Name");
		document.getElementById("name").focus();
		return false;
	}
	// Validation of Email:
	email=document.getElementById("email").value;
		if(email=="")
		{
			alert ("Please Enter E-mail ID");
			document.getElementById("email").focus();
			return false;
		}
		// Validation Email must be correct form:
		if(email.indexOf("@") ==-1 || email.lastIndexOf(".")==0 || email.indexOf("@")>email.lastIndexOf("."))
		{
			alert ("Invalid Email // As like milan@gmail.com");
			email=document.getElementById("email").focus();
			return false;
		}
		
	// Validation of Name:
	mes=document.getElementById("mes").value;
	if(mes=="")
	{
		alert("Please Enter the The Message");
		document.getElementById("mes").focus();
		return false;
	}
}












