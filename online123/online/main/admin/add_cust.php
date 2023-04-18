<?php
include('header.php');
$number = mt_rand(100000000,999999999);
$number1 = mt_rand(100000000,999999999);
$number2 = mt_rand(100000000,999999999);
if(isset($_REQUEST['add_user'])) {
$cust_name = $_REQUEST['cust_name'];
$user_id = $_REQUEST['user_id'];
$customer_id = $_REQUEST['customer_id'];
$cust_photo = $_REQUEST['cust_photo'];
$cust_sex = $_REQUEST['cust_sex']; 
$cust_mail = $_REQUEST['cust_mail'];
$cust_phone = $_REQUEST['cust_phone'];
$cust_password = $_REQUEST['cust_password'];
$cust_address = $_REQUEST['cust_address'];
$cust_countrycode = $_REQUEST['cust_countrycode'];
$cust_branch_name = $_REQUEST['cust_branch_name'];
$digital_signature = $_REQUEST['digital_signature'];
$finger_print = $_REQUEST['finger_print'];
$scanning_documents = $_REQUEST['scanning_documents'];
$act_number = $_REQUEST['act_number'];
$act_type = $_REQUEST['act_type'];
$joining_date = date("m.d.Y");
$currency= $_REQUEST['currency'];
$qid=$_POST['q1'];
  $ans=$_POST['ans1'];
  $qid2=$_POST['q2'];
  $ans2=$_POST['ans2'];

$cust_photo = $_FILES['cust_photo']['name'];
move_uploaded_file($_FILES['cust_photo']['tmp_name'],"img/account_data/".$act_number."_".$cust_photo);
$digital_signature = $_FILES['digital_signature']['name'];
move_uploaded_file($_FILES['digital_signature']['tmp_name'],"img/account_data/digital_signature/".$digital_signature);
$finger_print = $_FILES['finger_print']['name'];
move_uploaded_file($_FILES['finger_print']['tmp_name'],"img/account_data/finger_print/".$finger_print);
$scanning_documents = $_FILES['scanning_documents']['name'];
move_uploaded_file($_FILES['scanning_documents']['tmp_name'],"img/account_data/scanning_documents/".$scanning_documents);

$insert_cust = mysql_query("insert into act_holder_details (cust_name,currency,cust_photo,cust_sex,cust_mail,cust_phone,cust_password,cust_address,cust_countrycode,cust_branch_name,cust_act_number,cust_atc_type,joining_date,digital_signature,finger_print,scanning_documents,user_id,customer_id,qid,ans,qid2,ans2) values('".$cust_name."','".$currency."','".$cust_photo."','".$cust_sex."','".$cust_mail."','".$cust_phone."','".$cust_password."','".$cust_address."','".$cust_countrycode."','".$cust_branch_name."','".$act_number."','".$act_type."','".$joining_date."','".$digital_signature."','".$finger_print."','".$scanning_documents."','".$user_id."','".$customer_id."','".$qid."','".$ans."','".$qid2."','".$ans2."')");
//print_r($insert_cust);
	$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
	$admin_email=$admin_email->email;
	$to=$cust_mail;
	$subject="ACCOUNT OPENING COMFIRMATION";
	$massege="
<style type='text/css'>
h4{font-family:Calibri, Tahoma, Geneva, sans-serif;}
table{font-family:Calibri, Tahoma, Geneva, sans-serif;font-size:13px;color:#666666;text-align:justify;}
td{text-align:justify;}
a{font-family:Calibri, Tahoma, Geneva, sans-serif;color:#FF6600;text-decoration:none;}
</style>
    <table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='9' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
      </tr>

        <tr>

          <td width='140'>&nbsp;</td>

          <td width='549' colspan='7'><div align='right'>".date('d-M-Y')."</div></td>

        </tr>

        <tr>

          <td colspan='9'><b> Dear Valued Customer </b></td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td colspan='9'>your account opening information is</td>

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

          <td colspan='8' width='549'> $act_number </td>

        </tr>

        <tr>

          <td width='130'> User ID </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $user_id </td>


        </tr>
		
		 <tr>

          <td width='130'> Customer ID </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $customer_id </td>

        </tr>
		<tr>

          <td width='130'> IPIN </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $cust_password </td>

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
mail($to, $subject, $massege,$headers);

if($insert_cust)
echo "<script>window.location = 'view_act_holder.php';</script>";
}
?>

<script language="javascript">
function randomchords(){
	var randomnumber=Math.floor(Math.random()*1000000);
	document.getElementById('IPIN').value=randomnumber;
	//alert(randomnumber);
	//var x=document.getElementById("ipin");
  //alert(x.innerHTML);
  return false;
}
function randomchordsuser(){
	var randomnumber=Math.floor(Math.random()*1000000000);
	document.getElementById('focusedInput123').value=randomnumber;
	//alert(randomnumber);
	//var x=document.getElementById("ipin");
  //alert(x.innerHTML);
  return false;
}

function randomchordscust(){
	var randomnumber=Math.floor(Math.random()*1000000000);
	document.getElementById('focusedInput12345').value=randomnumber;
	//alert(randomnumber);
	//var x=document.getElementById("ipin");
  //alert(x.innerHTML);
  return false;
}

</script>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Add Customer</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Add Customer </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<a href="add_cust.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Customer</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							<div class="control-group">
							  <label class="control-label" for="date01">User ID</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput123" type="text" name="user_id" readonly="readonly" required value="<?php echo $number; ?>">
                                  
                                  
                                  	  &nbsp;
                                  <a href="#" title="Auto Generate Password" data-rel="tooltip" class="btn btn-warning link-ipin" id="generate" onclick="return randomchordsuser()" >
                                Generate User Id
                                </a>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Customer ID</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput12345" type="text" name="customer_id" readonly="readonly" required value="<?php echo $number1; ?>">
                                  
                                  
                                  
                                  	  &nbsp;
                                  <a href="#" title="Auto Generate Password" data-rel="tooltip" class="btn btn-warning link-ipin" id="generate" onclick="return randomchordscust()" >
                                Generate Customer Id
                                </a>
                                  
								</div>
							</div>
                            
                    				
                            <div class="control-group">
							  <label class="control-label" for="date01">Customer Name</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_name" required>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput"> Customer photograph </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="cust_photo">
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01"> Sex</label>
							 <div class="controls">
								  <label class="radio">
									<input type="radio" name="cust_sex" id="optionsRadios1" value="male" required> Male
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="cust_sex" id="optionsRadios2" value="female"> Female
								  </label>
								</div>
							</div>	
							
                            <div class="control-group">
							  <label class="control-label" for="date01"> Mail ID</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="email" value="" name="cust_mail" required>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Mobile Number</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_phone" required>
                                  <span class="label label-important">Mobile Number without country code</span>
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">IPIN</label>
							 <div class="controls">
								 
<input class="input-xlarge focused" id="IPIN" type="text" value="" name="cust_password" required>
<!-- <label class="input-xlarge focused" id="IPIN" for="cust_password"></label>-->
								  &nbsp;
                                  <a href="#" title="Auto Generate Password" data-rel="tooltip" class="btn btn-warning link-ipin" id="generate" onclick="return randomchords()" >
                                Generate IPIN
                                </a>
                                </div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Address</label>
							 <div class="controls">
								  <textarea class="autogrow" name="cust_address" required></textarea>
								</div>
							</div>
                            	
                            <div class="control-group">
							  <label class="control-label" for="date01"> Country</label>
							 <div class="controls">
								  <select name="cust_countrycode">
                                     <option value="44">UK (+44)</option> 
                                     <option value="1">USA (+1)</option> 
                                     <option value="213">Algeria (+213)</option> 
                                     <option value="376">Andorra (+376)</option> 
                                     <option value="244">Angola (+244)</option> 
                                     <option value="1264">Anguilla (+1264)</option> 
                                     <option value="1268">Antigua &amp; Barbuda (+1268)</option> 
                                     <option value="599">Antilles (Dutch) (+599)</option> 
                                     <option value="54">Argentina (+54)</option> 
                                     <option value="374">Armenia (+374)</option> 
                                     <option value="297">Aruba (+297)</option> 
                                     <option value="247">Ascension Island (+247)</option> 
                                     <option value="61">United Arab Emirates (+61)</option> 
                                     <option value="43">Austria (+43)</option> 
                                     <option value="994">Azerbaijan (+994)</option> 
                                     <option value="1242">Bahamas (+1242)</option> 
                                     <option value="973">Bahrain (+971)</option> 
                                     <option value="880">Bangladesh (+880)</option> 
                                     <option value="1246">Barbados (+1246)</option> 
                                     <option value="375">Belarus (+375)</option> 
                                     <option value="32">Belgium (+32)</option> 
                                     <option value="501">Belize (+501)</option> 
                                     <option value="229">Benin (+229)</option> 
                                     <option value="1441">Bermuda (+1441)</option> 
                                     <option value="975">Bhutan (+975)</option> 
                                     <option value="591">Bolivia (+591)</option> 
                                     <option value="387">Bosnia Herzegovina (+387)</option> 
                                     <option value="267">Botswana (+267)</option> 
                                     <option value="55">Brazil (+55)</option> 
                                     <option value="673">Brunei (+673)</option> 
                                     <option value="359">Bulgaria (+359)</option> 
                                     <option value="226">Burkina Faso (+226)</option> 
                                     <option value="257">Burundi (+257)</option> 
                                     <option value="855">Cambodia (+855)</option> 
                                     <option value="237">Cameroon (+237)</option> 
                                     <option value="1">Canada (+1)</option> 
                                     <option value="238">Cape Verde Islands (+238)</option> 
                                     <option value="1345">Cayman Islands (+1345)</option> 
                                     <option value="236">Central African Republic (+236)</option> 
                                     <option value="56">Chile (+56)</option> 
                                     <option value="86">China (+86)</option> 
                                     <option value="57">Colombia (+57)</option> 
                                     <option value="269">Comoros (+269)</option> 
                                     <option value="242">Congo (+242)</option> 
                                     <option value="682">Cook Islands (+682)</option> 
                                     <option value="506">Costa Rica (+506)</option> 
                                     <option value="385">Croatia (+385)</option> 
                                     <option value="53">Cuba (+53)</option> 
                                     <option value="90392">Cyprus North (+90392)</option> 
                                     <option value="357">Cyprus South (+357)</option> 
                                     <option value="42">Czech Republic (+42)</option> 
                                     <option value="45">Denmark (+45)</option> 
                                     <option value="2463">Diego Garcia (+2463)</option> 
                                     <option value="253">Djibouti (+253)</option> 
                                     <option value="1809">Dominica (+1809)</option> 
                                     <option value="1809">Dominican Republic (+1809)</option> 
                                     <option value="593">Ecuador (+593)</option> 
                                     <option value="20">Egypt (+20)</option> 
                                     <option value="353">Eire (+353)</option> 
                                     <option value="503">El Salvador (+503)</option> 
                                     <option value="240">Equatorial Guinea (+240)</option> 
                                     <option value="291">Eritrea (+291)</option> 
                                     <option value="372">Estonia (+372)</option> 
                                     <option value="251">Ethiopia (+251)</option> 
                                     <option value="500">Falkland Islands (+500)</option> 
                                     <option value="298">Faroe Islands (+298)</option> 
                                     <option value="679">Fiji (+679)</option> 
                                     <option value="358">Finland (+358)</option> 
                                     <option value="33">France (+33)</option> 
                                     <option value="594">French Guiana (+594)</option> 
                                     <option value="689">French Polynesia (+689)</option> 
                                     <option value="241">Gabon (+241)</option> 
                                     <option value="220">Gambia (+220)</option> 
                                     <option value="7880">Georgia (+7880)</option> 
                                     <option value="49">Germany (+49)</option> 
                                     <option value="233">Ghana (+233)</option> 
                                     <option value="350">Gibraltar (+350)</option> 
                                     <option value="30">Greece (+30)</option> 
                                     <option value="299">Greenland (+299)</option> 
                                     <option value="1473">Grenada (+1473)</option> 
                                     <option value="590">Guadeloupe (+590)</option> 
                                     <option value="671">Guam (+671)</option> 
                                     <option value="502">Guatemala (+502)</option> 
                                     <option value="224">Guinea (+224)</option> 
                                     <option value="245">Guinea - Bissau (+245)</option> 
                                     <option value="592">Guyana (+592)</option> 
                                     <option value="509">Haiti (+509)</option> 
                                     <option value="504">Honduras (+504)</option> 
                                     <option value="852">Hong Kong (+852)</option> 
                                     <option value="36">Hungary (+36)</option> 
                                     <option value="354">Iceland (+354)</option> 
                                     <option value="91">India (+91)</option> 
                                     <option value="62">Indonesia (+62)</option> 
                                     <option value="98">Iran (+98)</option> 
                                     <option value="964">Iraq (+964)</option> 
                                     <option value="972">Israel (+972)</option> 
                                     <option value="39">Italy (+39)</option> 
                                     <option value="225">Ivory Coast (+225)</option> 
                                     <option value="1876">Jamaica (+1876)</option> 
                                     <option value="81">Japan (+81)</option> 
                                     <option value="962">Jordan (+962)</option> 
                                     <option value="7">Kazakhstan (+7)</option> 
                                     <option value="254">Kenya (+254)</option> 
                                     <option value="686">Kiribati (+686)</option> 
                                     <option value="850">Korea North (+850)</option> 
                                     <option value="82">Korea South (+82)</option> 
                                     <option value="965">Kuwait (+965)</option> 
                                     <option value="996">Kyrgyzstan (+996)</option> 
                                     <option value="856">Laos (+856)</option> 
                                     <option value="371">Latvia (+371)</option> 
                                     <option value="961">Lebanon (+961)</option> 
                                     <option value="266">Lesotho (+266)</option> 
                                     <option value="231">Liberia (+231)</option> 
                                     <option value="218">Libya (+218)</option> 
                                     <option value="417">Liechtenstein (+417)</option> 
                                     <option value="370">Lithuania (+370)</option> 
                                     <option value="352">Luxembourg (+352)</option> 
                                     <option value="853">Macao (+853)</option> 
                                     <option value="389">Macedonia (+389)</option> 
                                     <option value="261">Madagascar (+261)</option> 
                                     <option value="265">Malawi (+265)</option> 
                                     <option value="60">Malaysia (+60)</option> 
                                     <option value="960">Maldives (+960)</option> 
                                     <option value="223">Mali (+223)</option> 
                                     <option value="356">Malta (+356)</option> 
                                     <option value="692">Marshall Islands (+692)</option> 
                                     <option value="596">Martinique (+596)</option> 
                                     <option value="222">Mauritania (+222)</option> 
                                     <option value="269">Mayotte (+269)</option> 
                                     <option value="52">Mexico (+52)</option> 
                                     <option value="691">Micronesia (+691)</option> 
                                     <option value="373">Moldova (+373)</option> 
                                     <option value="377">Monaco (+377)</option> 
                                     <option value="976">Mongolia (+976)</option> 
                                     <option value="1664">Montserrat (+1664)</option> 
                                     <option value="212">Morocco (+212)</option> 
                                     <option value="258">Mozambique (+258)</option> 
                                     <option value="95">Myanmar (+95)</option> 
                                     <option value="264">Namibia (+264)</option> 
                                     <option value="674">Nauru (+674)</option> 
                                     <option value="977">Nepal (+977)</option> 
                                     <option value="31">Netherlands (+31)</option> 
                                     <option value="687">New Caledonia (+687)</option> 
                                     <option value="64">New Zealand (+64)</option> 
                                     <option value="505">Nicaragua (+505)</option> 
                                     <option value="227">Niger (+227)</option> 
                                     <option value="234">Nigeria (+234)</option> 
                                     <option value="683">Niue (+683)</option> 
                                     <option value="672">Norfolk Islands (+672)</option> 
                                     <option value="670">Northern Marianas (+670)</option> 
                                     <option value="47">Norway (+47)</option> 
                                     <option value="968">Oman (+968)</option> 
                                     <option value="92">Pakistan (+92)</option> 
                                     <option value="680">Palau (+680)</option> 
                                     <option value="507">Panama (+507)</option> 
                                     <option value="675">Papua New Guinea (+675)</option> 
                                     <option value="595">Paraguay (+595)</option> 
                                     <option value="51">Peru (+51)</option> 
                                     <option value="63">Philippines (+63)</option> 
                                     <option value="48">Poland (+48)</option> 
                                     <option value="351">Portugal (+351)</option> 
                                     <option value="1787">Puerto Rico (+1787)</option> 
                                     <option value="974">Qatar (+974)</option> 
                                     <option value="262">Reunion (+262)</option> 
                                     <option value="40">Romania (+40)</option> 
                                     <option value="7">Russia (+7)</option> 
                                     <option value="250">Rwanda (+250)</option> 
                                     <option value="378">San Marino (+378)</option> 
                                     <option value="239">Sao Tome &amp; Principe (+239)</option> 
                                     <option value="966">Saudi Arabia (+966)</option> 
                                     <option value="221">Senegal (+221)</option> 
                                     <option value="381">Serbia (+381)</option> 
                                     <option value="248">Seychelles (+248)</option> 
                                     <option value="232">Sierra Leone (+232)</option> 
                                     <option value="65">Singapore (+65)</option> 
                                     <option value="421">Slovak Republic (+421)</option> 
                                     <option value="386">Slovenia (+386)</option> 
                                     <option value="677">Solomon Islands (+677)</option> 
                                     <option value="252">Somalia (+252)</option> 
                                     <option value="27">South Africa (+27)</option> 
                                     <option value="34">Spain (+34)</option> 
                                     <option value="94">Sri Lanka (+94)</option> 
                                     <option value="290">St. Helena (+290)</option> 
                                     <option value="1869">St. Kitts (+1869)</option> 
                                     <option value="1758">St. Lucia (+1758)</option> 
                                     <option value="249">Sudan (+249)</option> 
                                     <option value="597">Suriname (+597)</option> 
                                     <option value="268">Swaziland (+268)</option> 
                                     <option value="46">Sweden (+46)</option> 
                                     <option value="41">Switzerland (+41)</option> 
                                     <option value="963">Syria (+963)</option> 
                                     <option value="886">Taiwan (+886)</option> 
                                     <option value="7">Tajikstan (+7)</option> 
                                     <option value="66">Thailand (+66)</option> 
                                     <option value="228">Togo (+228)</option> 
                                     <option value="676">Tonga (+676)</option> 
                                     <option value="1868">Trinidad &amp; Tobago (+1868)</option> 
                                     <option value="216">Tunisia (+216)</option> 
                                     <option value="90">Bahrain (+90)</option> 
                                     <option value="7">Turkmenistan (+7)</option> 
                                     <option value="993">Turkmenistan (+993)</option> 
                                     <option value="1649">Turks &amp; Caicos Islands (+1649)</option> 
                                     <option value="688">Tuvalu (+688)</option> 
                                     <option value="256">Uganda (+256)</option> 
                                     <option value="44" selected>UK (+44)</option> 
                                     <option value="380">Ukraine (+380)</option> 
                                     <option value="971" selected="selected">United Arab Emirates (+971)</option> 
                                     <option value="598">Uruguay (+598)</option> 
                                     <option value="1">USA (+1)</option> 
                                     <option value="7">Uzbekistan (+7)</option> 
                                     <option value="678">Vanuatu (+678)</option> 
                                     <option value="379">Vatican City (+379)</option> 
                                     <option value="58">Venezuela (+58)</option> 
                                     <option value="84">Vietnam (+84)</option> 
                                     <option value="84">Virgin Islands - British (+1284)</option> 
                                     <option value="84">Virgin Islands - US (+1340)</option> 
                                     <option value="681">Wallis &amp; Futuna (+681)</option> 
                                     <option value="969">Yemen (North)(+969)</option> 
                                     <option value="967">Yemen (South)(+967)</option> 
                                     <option value="381">Yugoslavia (+381)</option> 
                                     <option value="243">Zaire (+243)</option> 
                                     <option value="260">Zambia (+260)</option> 
                                     <option value="263">Zimbabwe (+263)</option>
                                  </select>
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput"> Digital Signature </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="digital_signature">
							  </div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput"> Finger Print </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="finger_print">
							  </div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput"> Scanning Documents </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="scanning_documents">
							  </div>
							</div> 
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Branch Name </label>
							  <div class="controls">
								  <select id="selectError3" name="cust_branch_name" class="cust_branch_name">
                                  <?php
								  $bank_details = mysql_query("SELECT * FROM bank_details");
								  while($bank_name_fetch = mysql_fetch_array($bank_details)) {
								  ?>
									<option value="<?php echo $bank_name_fetch['branch_name']; ?>"><?php echo $bank_name_fetch['branch_name']; ?></option>
								  <?php
								  }
								  ?>	
								  </select>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Account Number </label>
							 <div class="controls">
                             	  <input class="form-row text-right" id="password" type="text" value="" name="act_number" required>
                                  &nbsp;
                                <!--  <a href="#" title="Auto Generate Password" data-rel="tooltip" class="btn btn-warning link-password" id="generate">
                                Generate Account Number
                                </a>-->
								</div>
							</div>		
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Account Type </label>
							  <div class="controls">
								  <select id="selectError3" name="act_type">
                                  <?php
								  $act_type = mysql_query("SELECT * FROM account_type");
								  while($act_type_fetch = mysql_fetch_array($act_type)) {
								  ?>
									<option value="<?php echo $act_type_fetch['type_name']; ?>"><?php echo $act_type_fetch['type_name']; ?></option>
								  <?php } ?>
								  </select>
								</div>
							</div>	
							 <div class="control-group">
                <label class="control-label" for="date01"> Currency</label>
               <div class="controls">
                  <select name="currency">
                                     <option value="">Select Currency</option>
<option value="AUD">Australian Dollar</option>
<option value="BRL">Brazilian Real </option>
<option value="CAD">Canadian Dollar</option>
<option value="CZK">Czech Koruna</option>
<option value="DKK">Danish Krone</option>
<option value="EUR">Euro</option>
<option value="HKD">Hong Kong Dollar</option>
<option value="HUF">Hungarian Forint </option>
<option value="ILS">Israeli New Sheqel</option>
<option value="JPY">Japanese Yen</option>
<option value="MYR">Malaysian Ringgit</option>
<option value="MXN">Mexican Peso</option>
<option value="NOK">Norwegian Krone</option>
<option value="NZD">New Zealand Dollar</option>
<option value="PHP">Philippine Peso</option>
<option value="PLN">Polish Zloty</option>
<option value="GBP">Pound Sterling</option>
<option value="SGD">Singapore Dollar</option>
<option value="SEK">Swedish Krona</option>
<option value="CHF">Swiss Franc</option>
<option value="TWD">Taiwan New Dollar</option>
<option value="THB">Thai Baht</option>
<option value="TRY">Turkish Lira</option>
<option value="USD" SELECTED="YES">U.S. Dollar</option>
                                     </select>

                                     
                </div>
              </div>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Security Question 1<span style="color:Red;background-color:White;">*</span></td>
                <td>
                     <select name="q1">
    <?php
    $sql2 ="SELECT  * FROM securityquestions";
    //echo $sql;
    $query2=mysql_query($sql2);

    while($row=mysql_fetch_row($query2))
    {?>
    <option value="<?=$row[1]?>"><?=$row[1]?></option>
    <?php }
    ?>
</select></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Answer Question 1<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="ans1" id="ans1"  autocomplete="off"  maxlength="200"    size="45"  type="text"></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Security Question 2<span style="color:Red;background-color:White;">*</span></td>
                <td>
                     <select name="q2">
    <?php
    $sql2 ="SELECT  * FROM securityquestions";
    //echo $sql;
    $query2=mysql_query($sql2);

    while($row=mysql_fetch_row($query2))
    {?>
    <option value="<?=$row[1]?>"><?=$row[1]?></option>
    <?php }
    ?>
</select></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Answer Question 2<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="ans2" id="ans2"  autocomplete="off"  maxlength="200"    size="45"  type="text"></td>
              </tr>
							<div class="form-actions">
							  <input type="submit" name="add_user"  class="btn btn-primary" name="add_user" value="Add Customer" />
							  <a href="view_act_holder.php" class="btn">Cancel</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
