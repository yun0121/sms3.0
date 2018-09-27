<?php
	session_start();
	unset($_SESSION['usname']);
	header("Refresh:1;url=indexdl.php");
?>