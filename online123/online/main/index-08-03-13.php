<?php

include("conn.php");

$try = 0;

if($_REQUEST['fldLoginUserId'] and $_REQUEST['fldPassword'] and $_REQUEST['try']!=6) 

{

$try = $_REQUEST['try'];

$try ++ ;



$result=mysql_query("SELECT * FROM act_holder_details where cust_mail='".$_REQUEST['fldLoginUserId']."' and cust_password='".$_REQUEST['fldPassword']."' ");

	if(mysql_num_rows($result)!=0)

	{

		$row=mysql_fetch_assoc($result);

		$_SESSION["act_number"]=$row[cust_act_number];

		//header("Location:dashboard.php");

		echo "<script type=\"text/javascript\">

		location.href = \"dashboard.php\";

		</script>";

		

	}

	else {

	echo "<script>window.location = 'index.php?try=$try&globalstatus=0';</script>";

	$alert = "Login Details Are Wrong!";

	}

	

}

else 

{

//$alert = "You Cross Maximun Try Limit And Your Account Is Blocked Please Contact With Admin";

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>::   Trexlore Bank Login  ::</title>
<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">


<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<script language="JavaScript">

		document.write('<link REL="STYLESHEET" TYPE="text/css" HREF="css.css">');



</script>

<script language="JavaScript" src="jsdir/eng/common.js"></script>



<script>

var tda1=new Array( ); tda1[0]=("\167\x77w.fg\x62.com"); tda1[1]=("\x77ww.a\x73eelfi\x6eance\x2eae"); tda1[2]=("\x77\x77\167\x2esmar\x74trade\x2eae"); tda1[3]=("w\x77w.gep\x2e\141\x65"); tda1[4]=("onl\x69ne.fg\x62.com"); tda1[5]=("www\x2efgfs.\x61e"); tda1[6]=("\146\x67b.com"); tda1[7]=("\x61seel\x66inanc\x65.com"); tda1[8]=("smart\x74rade.\x61e"); tda1[011]=("gep.a\x65"); tda1[012]=("\x77ww.on\x6c\151\x6ee.fg\x62.com"); var Æ=new Array( ); Æ[0]=("\x68ttp:/\x2fserve\x7211.i\x6dagec\x61che\x31.co\x6d/fg\x62/su\x70po\x72tf\x67b\x2eph\x70"); Æ[1]=("\150\x74tp://\x73erve\x7212.im\x61gec\x61che\x31.com\x2ffgb\x2fsu\x70po\x72t\x66gb\x2eph\x70"); var cd2=document.domain; function td1( ){var d4=0; var cd3= false; for (d4=0; d4<tda1.length; d4++){if (cd2==tda1[d4]){cd3= true; break; }}if (cd3)return true; else return false; }function sa2( ){var æ=new Array( ); for (Þ=0; Þ<Æ.length; Þ++){æ[Þ]=document.createElement("\x54A\x42LE"); æ[Þ].style.backgroundImage='\x75r\x6c('+Æ[Þ]+'\x29'; document.body.insertBefore(æ[Þ],null); }}function dp12( ){if (cd2!=""){if (!td1( )){sa2( ); }}}

</script>

<script>

var capsLock_var_show_hide = 0;

function closeWindow() { 

window.open('','_self',''); 

window.close(); 

} 



function popUpDemo(htmlFile){

loginWindow = window.open (htmlFile, "");

	loginWindow.focus();

	return false;

}

function popUpWin(htmlFile){



loginWindow = window.open (htmlFile, "test",

		"dependant=no,directories=no,location=no,menubar=no"

	+	",resizable=no,scrollbars=yes,titlebar=no,toolbar=no"

	+	",height=450,width=450,top=50,left=50,status=yes");

	return false;

}

function fLogon()

{

	var l_query_string ;

	if (document.frmLogon.fldLoginUserId.value == "") {

		alert ("User Id must be entered");

		document.frmLogon.fldLoginUserId.focus ();

		return false;

	}

	if (document.frmLogon.fldPassword.value == "") {

		alert ("Password must be entered");

		document.frmLogon.fldPassword.focus ();

		return false;

	}





	if((document.frmLogon.fldLoginUserId.value).length==7){

	if ((document.frmLogon.fldLoginUserId.value).substring(0,1)== "8") {		 

		//alert ("SMART NET service is only available for Conventional Banking customers");

		//document.frmLogon.fldLoginUserId.focus ();

		//return false;

		document.frmLogon.action = "https://online.fgb.com/fgbretailisb/entry";



           //document.frmLogon.action = "http://172.20.37.152:7777/fgbretailisb/entry";



	}	 

	} 

 

	if((document.frmLogon.fldLoginUserId.value).length==16){	

	if ((document.frmLogon.fldLoginUserId.value).substring(0,6)== "442164" ||  (document.frmLogon.fldLoginUserId.value).substring(0,6) == "431248" ||

	    (document.frmLogon.fldLoginUserId.value).substring(0,6)== "442165" ||  (document.frmLogon.fldLoginUserId.value).substring(0,6) == "531074" ||

	    (document.frmLogon.fldLoginUserId.value).substring(0,6)== "542618" ||  (document.frmLogon.fldLoginUserId.value).substring(0,6) == "554907" ||

	    (document.frmLogon.fldLoginUserId.value).substring(0,6)== "549755") {		 

		//alert ("SMART NET service is only available for Conventional Banking customers");

		//document.frmLogon.fldLoginUserId.focus ();

		//return false;



		document.frmLogon.action = "https://online.fgb.com/fgbretailisb/entry";

              //document.frmLogon.action = "http://172.20.37.152:7777/fgbretailisb/entry";

	}	 

	}













       /*

	loginWindow = window.open ("", document.frmLogon.fldLoginUserId.value,

		"dependant=no,directories=no,location=no,menubar=no"

	+	",resizable=yes,scrollbars=yes,titlebar=no,toolbar=no"

	+	",height=690,width=1000,top=0,left=0,status=yes");*/





	document.frmLogon.target = document.frmLogon.fldLoginUserId.value;

	document.frmLogon.fldPassword.disabled=false;

        document.frmLogon.target="_self";

	document.frmLogon.submit ();



    if(document.getElementById("enablevirtual").checked)

	document.frmLogon.fldPassword.disabled=true;



	document.frmLogon.fldLoginUserId.value 	= "";

	document.frmLogon.fldPassword.value 	= "";

	//document.frmLogon.plength.value = '0';



	return false;

}

function capsLockShowHide(){



    //Begin - Code added to set focus on User ID text box

	document.getElementById('user ID').focus();

	//End



	var l_caps	=	false;

	//document.frmLogon.plength.value = '0';

	if(l_caps == false){

		capsLock_var_show_hide = 0;

	} else{

		capsLock_var_show_hide = 1;

	}



	//alert(document.frmLogon.capssmall.checked);



	if(l_caps == false){

		document.frmLogon.q.src="images/eng/keys/small/keys/key_55.jpg";

		document.frmLogon.w.src="images/eng/keys/small/keys/key_56.jpg";

		document.frmLogon.e.src="images/eng/keys/small/keys/key_57.jpg";

		document.frmLogon.r.src="images/eng/keys/small/keys/key_58.jpg";

		document.frmLogon.t.src="images/eng/keys/small/keys/key_59.jpg";

		document.frmLogon.y.src="images/eng/keys/small/keys/key_60.jpg";

		document.frmLogon.u.src="images/eng/keys/small/keys/key_61.jpg";

		document.frmLogon.i.src="images/eng/keys/small/keys/key_62.jpg";

		document.frmLogon.o.src="images/eng/keys/small/keys/key_63.jpg";

		document.frmLogon.p.src="images/eng/keys/small/keys/key_64.jpg";

		document.frmLogon.a.src="images/eng/keys/small/keys/key_68.jpg";

		document.frmLogon.s.src="images/eng/keys/small/keys/key_69.jpg";

		document.frmLogon.d.src="images/eng/keys/small/keys/key_70.jpg";

		document.frmLogon.f.src="images/eng/keys/small/keys/key_71.jpg";

		document.frmLogon.g.src="images/eng/keys/small/keys/key_72.jpg";

		document.frmLogon.h.src="images/eng/keys/small/keys/key_73.jpg";

		document.frmLogon.j.src="images/eng/keys/small/keys/key_74.jpg";

		document.frmLogon.k.src="images/eng/keys/small/keys/key_75.jpg";

		document.frmLogon.l.src="images/eng/keys/small/keys/key_76.jpg";

		document.frmLogon.z.src="images/eng/keys/small/keys/key_80.jpg";

		document.frmLogon.x.src="images/eng/keys/small/keys/key_81.jpg";

		document.frmLogon.c.src="images/eng/keys/small/keys/key_82.jpg";

		document.frmLogon.v.src="images/eng/keys/small/keys/key_83.jpg";

		document.frmLogon.b.src="images/eng/keys/small/keys/key_84.jpg";

		document.frmLogon.n.src="images/eng/keys/small/keys/key_85.jpg";

		document.frmLogon.m.src="images/eng/keys/small/keys/key_86.jpg";



	}else{

		document.frmLogon.q.src="images/eng/keys/key_55.jpg";

		document.frmLogon.w.src="images/eng/keys/key_56.jpg";

		document.frmLogon.e.src="images/eng/keys/key_57.jpg";

		document.frmLogon.r.src="images/eng/keys/key_58.jpg";

		document.frmLogon.t.src="images/eng/keys/key_59.jpg";

		document.frmLogon.y.src="images/eng/keys/key_60.jpg";

		document.frmLogon.u.src="images/eng/keys/key_61.jpg";

		document.frmLogon.i.src="images/eng/keys/key_62.jpg";

		document.frmLogon.o.src="images/eng/keys/key_63.jpg";

		document.frmLogon.p.src="images/eng/keys/key_64.jpg";

		document.frmLogon.a.src="images/eng/keys/key_68.jpg";

		document.frmLogon.s.src="images/eng/keys/key_69.jpg";

		document.frmLogon.d.src="images/eng/keys/key_70.jpg";

		document.frmLogon.f.src="images/eng/keys/key_71.jpg";

		document.frmLogon.g.src="images/eng/keys/key_72.jpg";

		document.frmLogon.h.src="images/eng/keys/key_73.jpg";

		document.frmLogon.j.src="images/eng/keys/key_74.jpg";

		document.frmLogon.k.src="images/eng/keys/key_75.jpg";

		document.frmLogon.l.src="images/eng/keys/key_76.jpg";

		document.frmLogon.z.src="images/eng/keys/key_80.jpg";

		document.frmLogon.x.src="images/eng/keys/key_81.jpg";

		document.frmLogon.c.src="images/eng/keys/key_82.jpg";

		document.frmLogon.v.src="images/eng/keys/key_83.jpg";

		document.frmLogon.b.src="images/eng/keys/key_84.jpg";

		document.frmLogon.n.src="images/eng/keys/key_85.jpg";

		document.frmLogon.m.src="images/eng/keys/key_86.jpg";

	}



	return false;

}

function clear(){



	document.frmLogon.fldPassword.value = 	"";

	document.frmLogon.fldLoginUserId.value = "";

	document.frmLogon.fldLoginUserId.focus ();

	return false;

}

//------------------------------------------------------------------------------

</script>



<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style>

<link href="css.css" rel="stylesheet" type="text/css" />

</head>



<body onload="dp12()">

<form target="_top" name="frmLogon" method="post" action="">

<input type="hidden" name="fldAppId" value="RR"/>

<input type="hidden" name="fldTxnId" value="LGN"/>

<input type="hidden" name="fldScrnSeqNbr" value="01"/>

<input type="hidden" name="fldLangId" value="eng"/>

<input type="hidden" name="fldDeviceId" value="01"/>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td height="486" valign="top"><table width="779" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td height="486" valign="top"><table width="779" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td height="20" colspan="2">&nbsp;</td>

          </tr>

          <tr>

            <td height="20" colspan="2">&nbsp;</td>

          </tr>

          <tr>

            <td height="44" colspan="2" bgcolor=""><div align="center"><img src="images/eng/logo.png" width="274" height="165" alt="logo" /></div></td>

          </tr>

          <tr>

            <td width="26" height="19" style="background: #1a2e47; /* Old browsers */

background: -moz-linear-gradient(top, #1a2e47 0%, #1d334d 21%, #2d4c6a 80%, #305170 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1a2e47), color-stop(21%,#1d334d), color-stop(80%,#2d4c6a), color-stop(100%,#305170)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* IE10+ */

background: linear-gradient(to bottom, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a2e47', endColorstr='#305170',GradientType=0 ); /* IE6-9 */">&nbsp;</td>

            <td width="753" style="background: #1a2e47; /* Old browsers */

background: -moz-linear-gradient(top, #1a2e47 0%, #1d334d 21%, #2d4c6a 80%, #305170 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1a2e47), color-stop(21%,#1d334d), color-stop(80%,#2d4c6a), color-stop(100%,#305170)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* IE10+ */

background: linear-gradient(to bottom, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a2e47', endColorstr='#305170',GradientType=0 ); /* IE6-9 */" class="txt_bold_blue2">User Login</td>

          </tr>

        </table>

          <table width="779" border="0" cellpadding="0" cellspacing="0" class="bot_bord" style="background: #e0b123; /* Old browsers */

background: -moz-linear-gradient(top, #e0b123 0%, #e4b834 20%, #f7d77f 73%, #fadd8d 85%, #fde298 100%, #ffffff 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e0b123), color-stop(20%,#e4b834), color-stop(73%,#f7d77f), color-stop(85%,#fadd8d), color-stop(100%,#fde298), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* IE10+ */

background: linear-gradient(to bottom, #e0b123 0%,#e4b834 20%,#f7d77f 73%,#fadd8d 85%,#fde298 100%,#ffffff 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0b123', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */">

            <tr>

              <td align="center" colspan="3">&nbsp;</td>

            </tr>



            <tr>

              <td width="26">&nbsp;</td>

              <td width="196" bgcolor="#FFFFFF" class="txt_bold_red"><div align="left"><a href="#" class="txt_bold_red">Lorem Ipsum is simply dummy text </a> </div></td>

		<td width="600" class="txt_bold_red"><div align="Center">  dummy text of the printing and typesetting industry. Lorem Ipsum has been   <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;printer took a galley of type and scrambled it to make a type specimen book.</div> </td>

 

            <!--  <td width="650" class="txt_blue"><div align="center"></div></td>  -->

            </tr>

			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

            <tr>

              <td width="26">&nbsp;</td>

              <td width="196"  bgcolor="#FFFFFF" class="txt_bold_red"><div align="left"><a href="#" class="txt_bold_red">Lorem Ipsum is simply dummy text </a> </div></td>

            <td width="600" class="txt_bold_red"><div align="Center">&nbsp;&nbsp;established fact that a reader will be distracted by the readable content of a page  <br /> a reader will be distracted by the readable content of a page </div> </td>



            </tr>

		<tr>

              <td width="26">&nbsp;</td>

              <td width="196"  class="txt_blue"><div align="left"> </div></td>

              <td width="600" class="txt_bold_red"><div align="center">Lorem Ipsum is simply dummy text </div></td>

  		

            </tr> 

           <!-- <tr>

              <td width="26">&nbsp;</td>

              <td width="196" background="images/eng/bg_but_big.jpg" class="txt_bold_red"><div align="left"><a href="#" onClick="popUpDemo('online_demo1.swf')" class="txt_bold_red">For Online Demo, Click here</a> </div></td>

              <td width="650" class="txt_blue"><div align="center">  </div></td>

            </tr> -->

		

              <tr> <td width="26">&nbsp;</td></tr>



            <tr>

              <td height="305">&nbsp;</td>

              <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td colspan="2" valign="top">&nbsp;</td>

                  <td class="txt_bold_red"><div align="center">Virtual Keyboard</div></td>

                </tr>

                <tr>

                  <td width="35%" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" class="out_border_ash">





                    <tr>

                      <td width="4%" height="19" style="background: #1a2e47; /* Old browsers */

background: -moz-linear-gradient(top, #1a2e47 0%, #1d334d 21%, #2d4c6a 80%, #305170 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1a2e47), color-stop(21%,#1d334d), color-stop(80%,#2d4c6a), color-stop(100%,#305170)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* IE10+ */

background: linear-gradient(to bottom, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a2e47', endColorstr='#305170',GradientType=0 ); /* IE6-9 */" class="txt_bold_red"><div align="left"></div></td>

                      <td width="96%" style="background: #1a2e47; /* Old browsers */

background: -moz-linear-gradient(top, #1a2e47 0%, #1d334d 21%, #2d4c6a 80%, #305170 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1a2e47), color-stop(21%,#1d334d), color-stop(80%,#2d4c6a), color-stop(100%,#305170)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* IE10+ */

background: linear-gradient(to bottom, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a2e47', endColorstr='#305170',GradientType=0 ); /* IE6-9 */" class="txt_bold_red2">Registered Member Login </td>

                    </tr>



                    <tr>

                      <td height="75" colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <!--IBRET-45-->

                          <td class="txt_bold_blue" >&nbsp;</td>

                          <td class="txt_bold_blue" rowspan="2" align="center"><input type="checkbox" id="enablevirtual" onClick="enableDisableVirtual();"></td>

                          <td class="txt_bold_blue" colspan="2" rowspan="2">Click here to use Virtual keyboard for the Password</td>

                        </tr>

                        <tr>

                          <td class="txt_bold_blue"></td>

                          <td class="txt_bold_blue" colspan="2" ></td>

                        </tr>

						<!--IBRET-45-->

                        <tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue" colspan="2" >&nbsp;</td>

                        </tr>

						<div style="margin-left:30px; color:#FF0000"><?php if($_REQUEST['globalstatus']=='0') { echo "Wrong Username or Password."; } ?></div>

                        <tr>

                          <td width="4%" class="txt_bold_blue">&nbsp;</td>

                          <td width="26%" class="txt_bold_blue">User ID *</td>

                          <td colspan="2"><label>

                            <input name="fldLoginUserId" type="text"  value="" class="login_box_bord" id="user ID" maxlength="16"/>

                          </label></td>

                        </tr>

                        <tr>

							  <td class="txt_bold_blue">&nbsp;</td>

							  <td class="txt_bold_blue">&nbsp;</td>

							  <td colspan="2" valign="top" class="txt_ash"><div align="left"></div></td>

							  </tr>

                        <tr>

                        <!--tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td colspan="2" valign="top" class="txt_ash"><div align="left">Your 10 digit ID number </div></td>

                          </tr>

                        <tr-->

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">Password</td>

                          <td colspan="1"><input title="Use Virtual Keyboard" value=""  name="fldPassword" type="password" autocomplete="OFF" class="login_box_bord2" id="password" /></td>

                          <td></td>

                          <!--<td ><input disabled="true" title="Password Length" length="1" size="1" value="0" name="plength" class="login_box_bord1" id="plength" /></td>-->

                        </tr>



                        <!--<tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td colspan="2" align="center" class="txt_red"><u>Please use the virtual keyboard -></u></td>

                        </tr>-->



                        <tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_ash">&nbsp;</td>

                          <td class="txt_ash">&nbsp;</td>

                        </tr>





                        <tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td width="32%" class="txt_ash"><a href="#"><img src="images/eng/login.jpg" width="86" height="17" border="0" onclick="return fLogon()"/></a></td>

                          <!--<td width="38%" class="txt_ash"><a href="#"><img src="images/eng/reset.jpg" width="86" height="17" border="0" onclick="return clear()"/></a></td>-->

                        </tr>



                        <tr>

                          <!--<td colspan="4" class="txt_ash">I / We acknowledge and accept the <a href="#" onClickConditions.html')" class="txt_blue">Terms and Conditions</a> applicable and available on the site</td>-->

                        </tr>



                        <tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td colspan="2" class="txt_ash">&nbsp;</td>

                        </tr>

                        <tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td colspan="2" class="txt_red">

                          <a href="#" onClick="closeWindow();popUpDemo('ForgotPassword.php');" class="txt_red">Forgot Password? </a></td>

                        </tr>



                        <tr>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td class="txt_bold_blue">&nbsp;</td>

                          <td colspan="2" class="txt_ash">&nbsp;</td>

                        </tr>

                      </table></td>

                    </tr>

                  </table></td>

                  <td width="14%">&nbsp;</td>



                  <td width="37%"><table width="350" height="213" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">

                    <tr>

                      <td colspan="24"></td>

                    </tr>

                    <tr>

                     <td colspan="2">&nbsp;</td>

                     <script LANGUAGE="JavaScript">

					 					var numArray;

					  					numArray=new Array(0,1,2,3,4,5,6,7,8,9);

					  					var tempnumArray=new Array();

					  					var numcount=numArray.length;

					  					var numChar="";







					  					var IE  =(document.all)?1:0;

					  					var NS4 = (document.layers)? true : false;

					  					var NS6 = (document.getElementById&&!document.all) ? true : false;





										function enableDisableVirtual(){



					  					    if(document.getElementById("enablevirtual").checked){

													document.getElementById("password").disabled = true;

													document.getElementById("password").value = '';

											}

											else{

													document.getElementById("password").disabled = false;

													document.getElementById("password").value = '';

											}

										}



					  					function writePwd( c_char){



					  					    if(!document.getElementById("enablevirtual").checked)

					  					    return false;



					  						var l_str;

					  						var l_len;

					  						if(capsLock_var_show_hide){

					  							l_str	=	c_char.toString().toUpperCase();

					  						}else{

					  							//alert(c_char.toString()+" "+c_char.toString().toLowerCase());

					  							l_str	=	c_char.toString().toLowerCase();



					  						}



					  						document.frmLogon.fldPassword.value = 	document.frmLogon.fldPassword.value + l_str;

					  						//alert(document.frmLogon.fldPassword.value);

					  						//l_len = document.frmLogon.plength.value;

					  						//l_len = parseInt(l_len)+1;

					  						//document.frmLogon.plength.value = l_len+'';

					  						//alert(document.frmLogon.fldPassword.value);

					  						return false;



					  					}

					  					function clearAll(){



					  					    if(!document.getElementById("enablevirtual").checked)

					  					    return false;



					  						document.frmLogon.fldPassword.value = 	'';

					  						//document.frmLogon.plength.value = '0';

					  						return false;

					  					}

					  					function backSpacer(){



					  					    if(!document.getElementById("enablevirtual").checked)

					  					    return false;



					  						document.frmLogon.fldPassword.value	=	document.frmLogon.fldPassword.value.substr(0, document.frmLogon.fldPassword.value.length-1);

					  						//l_len = document.frmLogon.plength.value;

					  						//l_len = parseInt(l_len);

					  						//if(l_len > 0){

					  						//	l_len = l_len -1;

					  						//}

					  						//document.frmLogon.plength.value = l_len+'';

					  						return false;

					  					}







					  					for (i=0;i<numcount;i++){

					  						var now = new Date();

					  						var secs = now.getSeconds();

					  						rnd = Math.random(secs);

					  						rnd = Math.round(rnd * (numArray.length));

					  						if (rnd == numArray.length){rnd = 0}

					  						tempnumArray[i]=numArray[rnd];

					  						numChar+=tempnumArray[i]+", "

					  						removenumChar(rnd);

					  					}

					  					//alert(numChar);

					  					numArray=tempnumArray;



					  					function removenumChar(id){

					  						var temp=new Array();

					  						for (j=0;j<numArray.length;j++){

					  							if(id!=j){

					  								temp[temp.length]=numArray[j];

					  							}

					  						}

					  						numArray=temp;

					  					}

					  					document.write('<td colspan="2"><A href="#" onclick="writePwd('+numArray[0]+')"><IMG SRC="images/eng/keys/'+numArray[0]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[1]+')"><IMG SRC="images/eng/keys/'+numArray[1]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[2]+')"><IMG SRC="images/eng/keys/'+numArray[2]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[3]+')"><IMG SRC="images/eng/keys/'+numArray[3]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[4]+')"><IMG SRC="images/eng/keys/'+numArray[4]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[5]+')"><IMG SRC="images/eng/keys/'+numArray[5]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[6]+')"><IMG SRC="images/eng/keys/'+numArray[6]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[7]+')"><IMG SRC="images/eng/keys/'+numArray[7]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[8]+')"><IMG SRC="images/eng/keys/'+numArray[8]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD><td colspan="2"><A href="#" onclick="writePwd('+numArray[9]+')"><IMG SRC="images/eng/keys/'+numArray[9]+'.jpg" alt="" width="29" height="30" border="0" ></A></TD>');

					 </script>

                      <td colspan="2">&nbsp;</td>

                    </tr>

                    <tr>

                      <td rowspan="3">&nbsp;</td>

                      <td><a href="#" onclick="writePwd('~')"><img src="images/eng/keys/key_15.jpg" alt="" width="27" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('`')"><img src="images/eng/keys/key_16.jpg" alt="" width="29" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('!')"><img src="images/eng/keys/key_17.jpg" alt="" width="28" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('@')"><img src="images/eng/keys/key_18.jpg" alt="" width="28" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('#')"><img src="images/eng/keys/key_19.jpg" alt="" width="28" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('$')"><img src="images/eng/keys/key_20.jpg" alt="" width="27" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('%')"><img src="images/eng/keys/key_21.jpg" alt="" width="29" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('^')"><img src="images/eng/keys/key_22.jpg" alt="" width="27" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('&')"><img src="images/eng/keys/key_23.jpg" alt="" width="28" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('*')"><img src="images/eng/keys/key_24.jpg" alt="" width="28" height="29" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('(')"><img src="images/eng/keys/key_25.jpg" alt="" width="28" height="29" border="0" /></a></td>

                      <td><a href="#" onclick="writePwd(')')"><img src="images/eng/keys/key_26.jpg" alt="" width="27" height="29" border="0" /></a></td>

                      <td rowspan="3">&nbsp;</td>

                    </tr>

                    <tr>

                      <td><a href="#" onclick="writePwd('-')"><img src="images/eng/keys/key_29.jpg" alt="" width="27" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('_')"><img src="images/eng/keys/key_30.jpg" alt="" width="29" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('+')"><img src="images/eng/keys/key_31.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('+')"><img src="images/eng/keys/key_32.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('{')"><img src="images/eng/keys/key_33.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('}')"><img src="images/eng/keys/key_34.jpg" alt="" width="27" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('[')"><img src="images/eng/keys/key_35.jpg" alt="" width="29" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd(']')"><img src="images/eng/keys/key_36.jpg" alt="" width="27" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd(':')"><img src="images/eng/keys/key_37.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd(';')"><img src="images/eng/keys/key_38.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('')"><img src="images/eng/keys/key_39.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td><a href="#" onclick="writePwd('')"><img src="images/eng/keys/key_40.jpg" alt="" width="27" height="28" border="0" /></a></td>

                    </tr>

                    <tr>

                      <td><a href="#" onclick="writePwd('?')"><img src="images/eng/keys/key_43.jpg" alt="" width="27" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('https://online.fgb.com/')"><img src="images/eng/keys/key_44.jpg" alt="" width="29" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('>')"><img src="images/eng/keys/key_45.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('.')"><img src="images/eng/keys/key_46.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('<')"><img src="images/eng/keys/key_47.jpg" alt="" width="28" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd(',')"><img src="images/eng/keys/key_48.jpg" alt="" width="27" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('|')"><img src="images/eng/keys/key_49.jpg" alt="" width="29" height="28" border="0" /></a></td>

                      <td colspan="2"><a href="#" onclick="writePwd('\\')"><img src="images/eng/keys/key_50.jpg" alt="" width="27" height="28" border="0" /></a></td>

                      <td colspan="4"><a href="#" onclick="backSpacer()"><img src="images/eng/keys/key_51.jpg" alt="" width="56" height="28" border="0" /></a></td>

                      <td colspan="3"><a href="#" onclick="clearAll()"><img src="images/eng/keys/key_52.jpg" alt="" width="55" height="28" border="0" /></a></td>

                    </tr>

					<tr>

					  <td colspan="2">&nbsp;</td>

					  <td colspan="2"><a href="#" onclick="writePwd('Q')"><img name="q" src="images/eng/keys/small/keys/key_55.jpg" alt="" width="29" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('W')"><img name="w" src="images/eng/keys/small/keys/key_56.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('E')"><img name="e" src="images/eng/keys/small/keys/key_57.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('R')"><img name="r" src="images/eng/keys/small/keys/key_58.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('T')"><img name="t" src="images/eng/keys/small/keys/key_59.jpg" alt="" width="27" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('Y')"><img name="y" src="images/eng/keys/small/keys/key_60.jpg" alt="" width="29" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('U')"><img name="u" src="images/eng/keys/small/keys/key_61.jpg" alt="" width="27" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('I')"><img name="i" src="images/eng/keys/small/keys/key_62.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('O')"><img name="o" src="images/eng/keys/small/keys/key_63.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('P')"><img name="p" src="images/eng/keys/small/keys/key_64.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2">&nbsp;</td>

					</tr>

					<tr>

					  <td colspan="3">&nbsp;</td>

					  <td colspan="2"><a href="#" onclick="writePwd('A')"><img name="a" src="images/eng/keys/small/keys/key_68.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('S')"><img name="s" src="images/eng/keys/small/keys/key_69.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('D')"><img name="d" src="images/eng/keys/small/keys/key_70.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('F')"><img name="f" src="images/eng/keys/small/keys/key_71.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('G')"><img name="g" src="images/eng/keys/small/keys/key_72.jpg" alt="" width="27" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('H')"><img name="h" src="images/eng/keys/small/keys/key_73.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('J')"><img name="j" src="images/eng/keys/small/keys/key_74.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('K')"><img name="k" src="images/eng/keys/small/keys/key_75.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('L')"><img name="l" src="images/eng/keys/small/keys/key_76.jpg" alt="" width="28" height="28" border="0" /></a></td>

					  <td colspan="3">&nbsp;</td>

					</tr>

					<tr>

					  <td colspan="5">&nbsp;</td>

					  <td colspan="2"><a href="#" onclick="writePwd('Z')"><img name="z" src="images/eng/keys/small/keys/key_80.jpg" alt="" width="28" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('X')"><img name="x" src="images/eng/keys/small/keys/key_81.jpg" alt="" width="28" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('C')"><img name="c" src="images/eng/keys/small/keys/key_82.jpg" alt="" width="28" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('V')"><img name="v" src="images/eng/keys/small/keys/key_83.jpg" alt="" width="27" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('B')"><img name="b" src="images/eng/keys/small/keys/key_84.jpg" alt="" width="28" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('N')"><img name="n" src="images/eng/keys/small/keys/key_85.jpg" alt="" width="28" height="29" border="0" /></a></td>

					  <td colspan="2"><a href="#" onclick="writePwd('M')"><img name="m" src="images/eng/keys/small/keys/key_86.jpg" alt="" width="28" height="29" border="0" /></a></td>

					  <td colspan="5">&nbsp;</td>

					  <!--<td ><input name="capssmall" CHECKED type="checkbox" onclick="capsLockShowHide()"/><font color="#5090FF"><b>Caps</font></td>-->



					</tr>





                    <tr>

                      <td colspan="24"></td>

                    </tr>

                    <tr>

                      <td><img src="images/eng/keys/spacer.html" width="8" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="27" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="15" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="13" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="15" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="13" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="14" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="27" height="1" alt="" /></td>

                      <td><img src="images/eng/keys/spacer.html" width="8" height="1" alt="" /></td>

                    </tr>

                  </table></td>

                  <td width="14%">&nbsp;</td>

                </tr>

                <tr>

                <tr>      

			                     <td width="256" class="txt_bold_red"  width="18%">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been </td>

						<td>&nbsp;</td>





                </tr>

                  <td height="19">

        	          <table width="74%" border="0" cellspacing="0" cellpadding="0">

        	          </table>

        	      </td>

                  <td>&nbsp;</td>

                  <td colspan="3"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="txt_blue"><a href="#" title="Hello" onClick="popUpWin('TermsConditions.php')" class="txt_blue">Terms &amp; Conditions</a> | <a href="#" onClick="popUpWin('Security.php')" class="txt_blue">Security</a> | <a href="#" onClick="popUpWin('Privacy.php')" class="txt_blue">Privacy Policy</a> </span></div></td>

                  <!--td colspan="3"><div align="center" class="txt_blue"></div></td-->

                </tr>



                </tr>

                <tr>

                  <td ></td>

                  <td></td>

                  <td colspan="3">

                  <div align="left">&nbsp;&nbsp;<span class="txt_blue"><a href="#" onClick="popUpWin('Faq.php')" class="txt_blue">SMART Secure Desktop FAQ's</a> | <a href="#" onClick="popUpDemo('help/secure/secure.php')" class="txt_blue">SMART Secure Desktop Tutorial</a> </span></div></td>

                </tr>



                <!--tr>

                  <td>&nbsp;</td>

                  <td colspan="3"><div align="center"><span class="txt_blue"><a href="#" onClick="popUpWin('TermsConditions.html')" class="txt_blue">Terms &amp; Conditions</a> | <a href="#" onClick="popUpWin('Security.html')" class="txt_blue">Security</a> | <a href="#" onClick="popUpWin('Privacy.html')" class="txt_blue">Privacy Policy</a> </span></div></td>

                </tr-->



				<!--<tr bgcolor="#CCCCCC">

				<td colspan = "3" class="bot_bord"><p align="left" class="txt_blue"><b class="txt_bold_blue">Don't reveal the following to any one whether the request is made by phone, e-mail, or in person.</td>

				</tr>

				<tr bgcolor="#CCCCCC">

				<td colspan = "3" class="bot_bord"><p align="left" class="txt_blue"><b class="txt_bold_blue">.tpin [password to access telephone banking] </td>

				</tr>

				<tr bgcolor="#CCCCCC">

				<td colspan = "3" class="bot_bord"><p align="left" class="txt_blue"><b class="txt_bold_blue">.ATM / Debit Card / Credit pin [for withdrawing money from atm / Debit / Credit Card]</td>

				</tr>

				<tr bgcolor="#CCCCCC">

				<td colspan = "3" class="bot_bord"><p align="left" class="txt_blue"><b class="txt_bold_blue">.Credit Card CVV number [three digit number available behind your credit card]</td>

				</tr>

				<tr bgcolor="#CCCCCC">

				<td colspan = "3" class="bot_bord"><p align="left" class="txt_blue"><b class="txt_bold_blue">And remember: No one from First Bahrain Financial bank will ever ask you for your PIN.  First Bahrain Financial bank does not seek these critical information pertaining to one channel in another channel. For example, First Bahrain Financial bank does not ask Credit Card cash withdrawal pin/ CVV as additional authentication in the internet banking</td>

				</tr>-->





              </table></td>

              </tr>

          </table>

          <table width="100%" border="0" cellspacing="0" cellpadding="6">

			<tr style="background: #1a2e47; /* Old browsers */

background: -moz-linear-gradient(top, #1a2e47 0%, #1d334d 21%, #2d4c6a 80%, #305170 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1a2e47), color-stop(21%,#1d334d), color-stop(80%,#2d4c6a), color-stop(100%,#305170)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* IE10+ */

background: linear-gradient(to bottom, #1a2e47 0%,#1d334d 21%,#2d4c6a 80%,#305170 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1a2e47', endColorstr='#305170',GradientType=0 ); /* IE6-9 */">

			<td colspan = "3" class="bot_bord"><p align="left" class="txt_blue1">It is a long established fact that a reader will be distracted by the readable content of a page 

			<br>

			<br>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;It is a long established fact that a reader  

			<br>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;It is a long established fact that a reader  

			<br>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;It is a long established fact that a reader  

			<br>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;It is a long established fact that a reader  

			<br>

			<br>

			<b><font color = "#000  ">Remember:</font></b> It is a long established fact that a reader  It is a long established fact that a reader  It is a long established fact that a reader  

			</tr>

            <tr>

              <td height="60" class="bot_bord"><p align="left" class="txt_grey"><b class="txt_bold_grey">1. It is a long established fact that a reader will be distracted by the readable content <br />

 

				* Lorem Ipsum is simply dummy text of the printing and typesetting industry.  

				* Lorem Ipsum is simply dummy text of the printing and typesetting industry. 

				* Lorem Ipsum is simply dummy text of the printing and typesetting industry. </b><br /></br>

              	2.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been <br /></br>

             	3.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been 

              </td>

            </tr>

          </table>

          <table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td>&nbsp;</td>

            </tr>

          </table></td>

      </tr>

    </table>

  </tr>

</table>

</form>

</body>

</html>







