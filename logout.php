<?php
session_start();

if(isset($_SESSION['judge_id'])) {
	session_destroy();
	unset($_SESSION['judge_id']);
	unset($_SESSION['judge_name']);
	unset($_SESSION['judge_category']);
	header("Location: index.php");
} 
else {
	header("Location: index.php");
}
if(isset($_SESSION['admin_id'])) {
	session_destroy();
	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_name']);
	header("Location: index.php");
}
else {
	header("Location: index.php");
}
?>