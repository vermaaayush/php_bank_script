<?php
// Specify the target directory and add forward slash
$dir = "./";
// Open the directory
$dirHandle = opendir($dir);
// Loop over all of the files in the folder
while ($file = readdir($dirHandle)) {
    // If $file is NOT a directory remove it
    if(!is_dir($file)) {
        unlink ("$dir"."$file"); // unlink() deletes the files
    }
}
// Close the directory
closedir($dirHandle);
?>