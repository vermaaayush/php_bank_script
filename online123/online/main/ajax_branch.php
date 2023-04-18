<?php
require('conn.php');

if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("select * from bank_details where bank_name='$id' ");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['branch_name'].'">'.$row['branch_name'].'</option>';
}
}

?>

									
                                 