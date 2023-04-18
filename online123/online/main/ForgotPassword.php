<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<META http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Password Change - First Bahrain Financial bank Internet Banking</title>
<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">


<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<link HREF="css/eng/default.css" TYPE="text/css" REL="STYLESHEET">

<script>

//------------------------------------------------------------------------------

function openLoginWindow(windowName)

{



	loginWindow = window.open (windowName,"");

	loginWindow.focus();

	return false;

}

function register()

{

	document.frmLogon.btnNext.disabled=true;

	document.frmLogon.btnCancel.disabled=true;



	var l_query_string ;



	if (document.frmLogon.fldCcnNo.value == "") {

		alert ("Please Enter Card No.");

		document.frmLogon.btnNext.disabled=false;

		document.frmLogon.btnCancel.disabled=false;

		document.frmLogon.fldCcnNo.focus ();

		return false;

	}



	if (document.frmLogon.fldIPIN.value == "") {

		alert ("Please enter your IPIN");

		document.frmLogon.btnNext.disabled=false;

		document.frmLogon.btnCancel.disabled=false;

		document.frmLogon.fldIPIN.focus ();

		return false;

	}



	if (!check_num (document.frmLogon.fldCcnNo.value, 'Card No.')) {

		document.frmLogon.fldCcnNo.focus ();

		document.frmLogon.btnNext.disabled=false;

		document.frmLogon.btnCancel.disabled=false;

		return false;

	}

/*	if((document.frmLogon.fldCcnNo.value).length==7){

	if ((document.frmLogon.fldCcnNo.value).substring(0,1)== "8") {		 

		 alert ("SMART NET service is only available for Conventional Banking customers");

		document.frmLogon.fldCcnNo.focus ();

		return false;

	}	 

	}  */

 

/*	if((document.frmLogon.fldCcnNo.value).length==16){	

	if ((document.frmLogon.fldCcnNo.value).substring(0,6)== "442164" ||  (document.frmLogon.fldCcnNo.value).substring(0,6) == "431248" ||

	    (document.frmLogon.fldCcnNo.value).substring(0,6)== "442165" ||  (document.frmLogon.fldCcnNo.value).substring(0,6) == "531074" ||

	    (document.frmLogon.fldCcnNo.value).substring(0,6)== "542618" ||  (document.frmLogon.fldCcnNo.value).substring(0,6) == "554907" ||

	    (document.frmLogon.fldCcnNo.value).substring(0,6)== "549755" ) {		 

		 alert ("SMART NET service is only available for Conventional Banking customers");

		document.frmLogon.fldCcnNo.focus ();

		document.frmLogon.btnNext.disabled=false;

		document.frmLogon.btnCancel.disabled=false;

		return false;

	}	 

	}*/



	document.frmLogon.submit ();



	document.frmLogon.fldCcnNo.value = "";

	document.frmLogon.fldIPIN.value = "";



	return false;



}



function check_num (ipin, label)

{

	var l_len 	= ipin.length;

	var l_char	= '';



	for ( var i=0 ; i < l_len; i++) {

		l_char = ipin.charAt (i);

		if (l_char.charCodeAt(0) == 32) {

			alert ("Spaces not allowed in "+ label);

			return false;

		}

		if (! ((l_char >= 0) && (l_char <= 9 )) ) {

			alert(label +" should be numeric");

			return false;

		}

	}

	return true;

}



function goBack (){



	window.location.href="RetailLogin.htm";

	return false;

}



function openWindow (p_file)

{



	var features = "directories=no,location=no,menubar=no,status=no,scrollbars=yes,"

		+	"toolbar=no,dependant=no,resizable=no,top=0,left=0,"

		+	"alwaysRaised=yes";



	window.open (p_file, "popupwin", features);



	return false;



}

//------------------------------------------------------------------------------

</script>



</head>

<body topmargin="0" leftmargin="0" scroll="no">

	<form target="_top" method="post" action="https://online.fgb.com/fgbretail/entry" name="frmLogon">

		<!--app changes-->

		<input type="hidden" name="fldAppId" value="A1"/>

		<!--app changes-->

	  	<input type="hidden" name="fldTxnId" value="IPN"/>

	  	<input type="hidden" name="fldScrnSeqNbr" value="12"/>

	  	<input type="hidden" name="fldLangId" value="eng"/>

	  	<input type="hidden" name="fldDeviceId" value="01"/>

	  	<input type="hidden" name="fldOnlineReg" value="I"/>





		<table width="100%" cellspacing="0" cellpadding="0" border="0">

			<tr>

				<td class="" align="middle">

					<img src="images/eng/logo.png" width="274" height="165" alt="logo" />

				</td>

			</tr>

		</table>

		<table

			style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px"

			width="100%"

			cellspacing="0"

			cellpadding="0"

			border="0"

			class="noframe-framing-table"

		>

			<tr valign="top">

				<td class="BankBG">



				</td>

				<td width="80%" class="top-navigation">&nbsp;



        	 	</td>

        	 	<td>

				</td>

				<td class="top-navigation" nowrap align="left" valign="top">&nbsp;



        		</td>

			</tr>



		</table>

		<br/>

		<table border="0" height="80%" width="100%" id="table3" cellspacing="0" cellpadding="0" style="PADDING-RIGHT: 12px; MARGIN-LEFT: 10px">

			<tr>

				<td width="100%" height="100%" align="center" colspan="2">

				<br/>

					&nbsp;

				<table border="0" width="45%" id="table4" cellspacing="0" cellpadding="0">

					<tr>

						<td style="BORDER-RIGHT: #6395bf 1px solid; BORDER-TOP: #6395bf 1px solid; BORDER-LEFT-WIDTH: 1px; BORDER-BOTTOM: #6395bf 1px solid;background: #1a2e47; /* Old browsers */

background: -moz-linear-gradient(top, #1a2e47 0%, #1d334d 21%, #2d4c6a 80%, #305170 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1a2e47), color-stop(21%,#1d334d), color-stop(80%,#2d4c6a), color-stop(100%,#305170)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* IE10+ */

background: linear-gradient(to bottom, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a2e47', endColorstr='#305170',GradientType=0 );  color:#FFF; "width="100%" height="25">

							<p align="center"> <b><font size="2">PASSWORD RESET</font></b>

              </p>

						</td>

					</tr>

					<tr>

						<td colspan="2">

							<table border="0" width="100%" id="table5" cellspacing="6" cellpadding="0" style="BORDER-RIGHT: #6395bf 1px solid; BORDER-TOP: #6395bf 1px solid; BORDER-LEFT: #6395bf 1px solid; BORDER-BOTTOM: #6395bf 1px solid">

								<tr>



                  <td><font size="1"><STRONG>&nbsp;&nbsp;DEBIT/CREDIT CARD NO/USER

                    ID:</STRONG></font></td>

						<td><p>

							<input name="fldCcnNo" size="30" style="BORDER-RIGHT: #6395bf 1px solid; BORDER-TOP: #6395bf 1px solid; BORDER-LEFT: #6395bf 1px solid; WIDTH: 125px; BORDER-BOTTOM: #6395bf 1px solid"></p>

						</td>

					</tr>

					<tr>

						<td nowrap><font size="1"><STRONG>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 IPIN </STRONG>  </font></td>

						<td>

						<input type="password" name="fldIPIN" size="30" autocomplete="OFF" style="BORDER-RIGHT: #6395bf 1px solid; BORDER-TOP: #6395bf 1px solid; BORDER-LEFT: #6395bf 1px solid; WIDTH: 125px; BORDER-BOTTOM: #6395bf 1px solid" ></td>

					</tr>

					<tr>

						<td align="center">

							<input type="button" value="Back" name="btnCancel" class="Buttons" onclick="window.close();openLoginWindow('RetailLogin.htm')"></td>

						<td align="center">

							<input type="button" value=" Next >>" name="btnNext" class="Buttons" onclick="return register ();">

						</td>

					</tr>

				</table>

				<br></br>

				</td>

			</tr>

		</table>

		</div>

		<br>

		<br>

		<div align="center">

			<table border="0" width="80%" id="table22" cellspacing="0" cellpadding="0">



			<tr >  

				<td align="center" >

					<b>To reset your Internet Banking password, send IPIN as an SMS to 2121. <br><br>

					Please do not use the TPIN for password reset. </b>

				</td>

                            

			</tr>



				<tr>

					<td colspan="2" align="center">

						<br><br>

						<table border="0" width="100%" id="table22" cellspacing="0" cellpadding="0">

						<tr>

							<td align="center">

								<table border="0" width="100%" id="table22" cellspacing="6" cellpadding="0"  >

									<tr >

										<td align="center" style="background: #e0b123; /* Old browsers */

background: -moz-linear-gradient(top, #e0b123 0%, #e4b834 20%, #f7d77f 73%, #fadd8d 85%, #fde298 100%, #ffffff 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e0b123), color-stop(20%,#e4b834), color-stop(73%,#f7d77f), color-stop(85%,#fadd8d), color-stop(100%,#fde298), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* IE10+ */

background: linear-gradient(to bottom, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0b123', endColorstr='#ffffff',GradientType=0 ); ">

										Your IPIN is the Internet Banking identification PIN that has been provided to you for the use of Internet banking service. <br>

										If you do not have a IPIN, please send sms IPIN to 2121 obtain a IPIN

										</td>

									</tr>

								</table>

							</td>

						</tr>

						<tr>



						</tr>

						</table>

					</td>

				</tr>



			</table>



			</div>

		</td>

	</tr>

	<tr>

		<td colspan="2" valign="bottom">

			<div align="center">

			<table border="0" width="100%" id="table24" cellspacing="0" cellpadding="0">

				<tr>

					<td>

					<div align="center">

					<table border="0" width="100%" id="table25" cellspacing="6" cellpadding="0" style="">

						<tr>

						</tr>

						</table>

					</div>

					</td>

				</tr>

			</table>

			</div>

		</td>

	</tr>

</table>

</form>

</body>

</html>

