function show(x){
	x.style.display = "block";
}


function CheckUsername(input)
{
	var user=/^(?=.*[@#$%]).{5}$/;
	if(input.value.match(user))
{
return true;}
else
{alert("Wrong Input, Please read the convention and try again");
return false;}  	
}


function CheckPassword(inputtxt)
{var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,12}$/;if(inputtxt.value.match(passw))
{
return true;}
else
{alert("Wrong Input, Please read the convention and try again");
return false;}}   


function CheckName(input)
{
	var name = /^[A-Za-z]+$/;
	if (input.value.match(name)) {
		return true;
	}
	else
	{alert("Wrong Input, only use letters");
     return false;}
}	

function checkselect1()
{
var select = document.querySelector('#bank')
   if(select.selectedIndex == 0){
       
       alert("Please select your bank name");
	   return false;
   }
   else
   {
	 return true;
   }
}


function checkbankacc(input)
{
	var bankacc = /^\d{11,16}$/;
	if (input.value.match(bankacc)) {
		return true;
	}
	else
	{
		alert("Wrong Input, Please fill a valid account No.");
	}
}


function checkcontact(input)
{
	var contact = /^[1-9]\d{9}$/
	if (input.value.match(contact)) {
		return true;
	}
	else
	{
		alert("Wrong Input, please fill a valid phone number");
	}
}

function checkEmail(input)
{
var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
if(input.value.match(mailformat))
{
return true;
}
else
{
alert("Wrong Input, please fill a valid Email-Id ");
return false;
}
}


function CheckPassword1(inputtxt)
{var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,12}$/;if(inputtxt.value.match(passw))
{
return true;}
else
{alert("Wrong Input, please fill a valid Password");
return false;}}

function CheckUsername1(input)
{
	var user=/^(?=.*[@#$%]).{5}$/;
	if(input.value.match(user))
{
return true;}
else
{alert("Wrong Input, please fill a valid Username");
return false;}  	
}


function check(input1, input2, message)
{
	if(input1.value == input2.value)
	{
      message.innerHTML = '&#9989;';
	}
	else 
	{
      message.innerHTML = '&#10060;';
  }
}
function hide(x) {
  if (x.type === "text") {
    x.type = "password";
  } else {
    x.type = "text";
  }
}


function show1(x) {
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "text";
  }
}


function checkotp(x){
	var otp=/^\d{6}$/;
	if(x.value.match(otp))
	{
		return true;
	}
	else
	{
		alert("Please fill a valid OTP")
	}
}

function checkamount(x){
	var am = parseInt(document.getElementById(x).value);
	if(am >= 100 && am<=1000000)
	{
		return true;
	}
	else
	{
		alert("Please fill a valid amount");
		return false;
	}
}


function checkbankacc1(input1, input2)
{
	if(input1.value == input2.value)
	{
		alert("Please enter different account number in this field");
		return false;
	}
	else
	{
		return true;
	}
}