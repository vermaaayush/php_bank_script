<?php
session_start();
 
$user["76562"] = "playme";
 
if (!isset($_SESSION['logged_in']))
{
    echo '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (empty($_POST['code']) || empty($_POST['static']))
        {
            echo '';
        }
        elseif ($user[$_POST['code']] != $_POST['static'])
        {
            echo '<span style="color:red; font-weight: bold">Invalid IRS Clearence Code!</span>';
        }
        else
        {
            header("Refresh: 1");
            $_SESSION['ingelogd'] = true;
            echo '<span style="color:green; font-weight: bold">Thank you for providig a valid IRS Clearence Code, your transfer has been concluded.!</span>';
        }
    }
    else
    {
        header("Location: transfer_invalid.php");
   exit;
    }
}
?>