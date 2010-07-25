// JScript File
//################################################################################
//###### Project   : Constant contact integration with word press  			######
//###### File Name : gConstantcontact.js            						######
//###### Purpose   : Javascript for constant-contact plugin					######
//###### Date      : June 20th 2009                  						######
//###### Updated   : June 16th 2010                  						######
//###### Author    : Gopi.R                        							######
//################################################################################

var xmlHttp
function GetXmlHttpObject(handler)
{ 
	var objXmlHttp=null
	if (navigator.userAgent.indexOf("Opera")>=0)
	{
		alert("This page doesn't work in Opera") 
		return 
	}
	if (navigator.userAgent.indexOf("MSIE")>=0)
	{ 
		var strName="Msxml2.XMLHTTP"
		if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
		{
			strName="Microsoft.XMLHTTP"
		} 
		try
		{ 
			objXmlHttp=new ActiveXObject(strName)
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		} 
		catch(e)
		{ 
			alert("Error. Scripting for ActiveX might be disabled") 
			return 
		} 
	} 
	if (navigator.userAgent.indexOf("Mozilla")>=0)
	{
		objXmlHttp=new XMLHttpRequest()
		objXmlHttp.onload=handler
		objXmlHttp.onerror=handler 
		return objXmlHttp
	}
} 
function gConstantcontact(siteurl)
{
	txt_email_newsletter=document.getElementById("gConstantcontact_email");
    if(txt_email_newsletter.value=="")
    {
        alert("Please enter the email address");
        txt_email_newsletter.focus();
        return false;    
    }
	if(txt_email_newsletter.value!="" && (txt_email_newsletter.value.indexOf("@",0)==-1 || txt_email_newsletter.value.indexOf(".",0)==-1))
    {
        alert("Please enter valid email")
        txt_email_newsletter.focus();
        txt_email_newsletter.select();
        return false;
    }
	document.getElementById("gConstantcontact_msg").innerHTML="loading..";
	var date_now=new Date()
    var mynumber=Math.random()
	var url=siteurl+"gCls1.php?txt_email_newsletter="+ txt_email_newsletter.value + "&timestamp=" + date_now + "&action=" + mynumber;
    xmlHttp=GetXmlHttpObject(newchanged)
    xmlHttp.open("GET", url , true)
    xmlHttp.send(null)
	
}

function newchanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		if(xmlHttp.responseText=="succ")
		{
			document.getElementById("gConstantcontact_msg").innerHTML="Subscribed successfully";
			document.getElementById("gConstantcontact_email").value="";
		}
		else if(xmlHttp.responseText=="exs")
		{
		    document.getElementById("gConstantcontact_msg").innerHTML="Already exist!";
		}
		else
		{
			document.getElementById("gConstantcontact_msg").innerHTML="Please try after some time!";
			document.getElementById("gConstantcontact_email").value="";
		}
	} 
} 