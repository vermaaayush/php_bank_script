		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php } ?>
		</div><!--/fluid-row-->
		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		<footer>
			<table cellspacing="2" cellpadding="1px" align="left"  border="0" width="100%" style="border-bottom: 3px solid #0b2a73;border-top: 3px solid #0b2a73; background-color: #0b2a73;">
              <tr>
                <td align="left" style="margin-top: 0px; padding-right: 5px; padding-left:10px; border-left: #999999 1px dotted;border-right: #999999 1px dotted;"><a id="FOOTERLNKEABOUTUS" href="#http://#en.html#global-ourfirm" target="_blank">About Us</a></td>
                <td align="left" style="margin-top: 0px; padding-left:10px;border-right: #999999 1px dotted;"><a id="FOOTERLNKSECURITY" href="#http://#en.html#global-our-commitment" target="_blank">Your Security</a></td>
                <td align="left" style="margin-top: 0px; padding-left:10px;border-right: #999999 1px dotted;"><a id="FOOTERLNKTERMSANDCONDITION" href="#" target="_blank">Terms &amp; Conditions</a></td>
                <td align="left" style="margin-top: 0px; padding-left:10px;border-right: #999999 1px dotted;"><a id="FOOTERLNKCONSUMERPRIVACEYPOLICY" href="#https://www.#privacy.html" target="_blank">Consumer Privacy Policy</a>&nbsp; </td>
                <td align="center" width="250" style="border-right: #999999 1px dotted;font-family :Arial;font-size:11px; text-decoration: none;color: #999;font-weight:bold;"> Trexlore Bank<img src='gif/logo_ehl.gif' alt="" width="17" height="13" border="0" /></td>
            </tr>
          </table>
		</footer>
		<?php } ?>

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function()
	{
		
	$(".cust_bank_name").change(function()
	{
	var dataString = 'id='+ $(this).val();
	$.ajax
	({
	type: "POST",
	url: "ajax_branch.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$(".cust_branch_name").html(html);
	} 
	});
	
	});
	});
	</script>
	 <!-- password generator -->
   <script type="text/JavaScript">
	function randomString() {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var string_length = 8;
            var randomstring = '';
            for (var i=0; i<string_length; i++) {
                    var rnum = Math.floor(Math.random() * chars.length);
                    randomstring += chars.substring(rnum,rnum+1);
            }
            document.getElementById('password').value = randomstring;
    }



	$('.link-password').click(function(e){
		return randomString();
	});

</script>
   <style type="text/css">
.wrap {width: 960px; margin: 20px auto;}
/*Form styles*/
.styled {font-family: Arial, sans-serif;}
.styled fieldset {padding: 10px;}
.styled fieldset ol, .styled fieldset ol li {list-style: none;}
.styled fieldset li.form-row {margin-bottom: 7px; padding: 2px 0; width: 100%; overflow: hidden; position: relative;}
.styled label {font-size: 12px; display: block; font-weight: bold; float: left; width: 100px; margin-left: 5px; line-height: 24px;}
.styled input.text-input, .styled .text-area {background: #fefefe; border-top: 1px solid #909090; border-right: 1px solid #cecece; border-bottom: 1px solid #e1e1e1; border-left: 1px solid #bbb; padding: 3px; width: 190px; font-size: 12px;}
.styled input.text-input.default.active, .styled .text-area.default.active {color: #666666; font-style: italic;}
.styled fieldset li.button-row {margin-bottom: 0; padding: 2px 5px;}
form input.btn-submit {padding: 3px 7px; font-family: Arial, sans-serif; color: #000; font-weight: bold; border: 1px solid #000; background: #FFE220; font-size: 12px;}
.link-password {margin-left: 10px;}
/* Form Validation */
.styled span.error {font-size: 11px; background: none; display: block; padding: 2px; text-align: center;}
.styled fieldset li.error {color: #D8000C; background: #fff0f0 url(../media/images/checkers.png) repeat; border: 1px solid #f9c7c7; padding: 5px 0;}
.styled fieldset li.error label {text-align: left;}

/* Specific Form Rules */
#form-demo {width: 330px; margin: 50px 0 100px 0; height: 170px; padding: 25px 10px 0 10px; background: url(images/bg_login.png) no-repeat 0 0;}
#confirm {display: none;}
.success {order: 1px solid; margin: 0; padding: 10px; text-align: center; color: #4F8A10; background-color: #ebf6d9; border-color: #DFF2BF;}
</style>
	<!-- password generator -->
	<script type="text/javascript">
	function chk_empty() {
	if(document.getElementById('date01').value=="")
	{
	alert("Please give the starting date");
	return false;
	}
	if(document.getElementById('date02').value=="")
	{
	alert("Please give the ending date");
	return false;
	}
	if( document.getElementById('act_number').value=="")
	{
	alert("Please give an account number");
	return false;
	}
	
	}
	</script>
	
</body>
</html>
