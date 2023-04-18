<?php

include("conn.php");

$user_id = $_SESSION["user_id"];

if(isset($_REQUEST['check_cust']) && isset($_REQUEST['customerid']))

{

	$sql=mysql_query("select * from act_holder_details where  user_id='".$user_id."' and customer_id='".$_REQUEST['customerid']."'");

	$rows = mysql_num_rows($sql);

	if($rows!=0)

	{

		echo "<script type='text/javascript'>

		location.href='dashboard.php';

		</script>";

	}

	else

	{

		echo "Wrong Customer ID";

	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">


<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

</head>



<body>

<form id="form1" name="form1" method="post" action="">

  <table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">

    <tr>

      <td align="center">What is your Customer ID?</td>

    </tr>

    <tr>

      <td align="center"><label>

        <input type="text" name="customerid" id="customerid" />

      </label></td>

    </tr>

    <tr>

      <td align="center"><label>

        <input type="submit" name="check_cust" id="check_cust" value="Submit" />

      </label></td>

    </tr>

  </table>

</form>

</body>

</html>

