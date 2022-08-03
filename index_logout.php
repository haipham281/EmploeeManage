<?php
session_start();
// Destroy all the Sessions
if(session_destroy())
{
// Redirect to the Home Page
header("Location: index.php");
}
?>
