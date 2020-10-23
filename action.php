<?php 
include("include.php");

if(isset($_POST['c_add'])){
if(isset($_POST['c_amount'])){
	if(!is_numeric($_POST['c_amount'])){die('Amount must be numeric');}	
}else{
	die("Insert amount");
}
if(isset($_POST['c_desc'])){
}else{
	die("Insert description");
}
if(isset($_POST['c_mode'])){
	if(!is_numeric($_POST['c_mode'])){die('mode');}	
}else{
	die("Insert mode");
}

if(isset($_POST['c_type'])){
	if(!is_numeric($_POST['c_type'])){die('type	');}	
}else{
	die("Insert type");
}

	$sql = "
	
	INSERT INTO `c_transactions`(`t_ty_id`, `t_cur_id`, `t_m_id`, `t_desc`, `t_amount`, `t_user_id`, `t_dnt`) VALUES (
	'".$_POST['c_type']."',
	'1',
	'".$_POST['c_mode']."',
	'".$_POST['c_desc']."',
	'".$_POST['c_amount']."',
	'1',
	'".time()."'
	
	)
	";
	
	
	if($conn->query($sql)){
		header('Location: index.php?a');
	}else{
		die($conn->error);
	}
}
?>