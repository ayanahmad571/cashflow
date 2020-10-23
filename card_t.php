<?php

include("include.php");
?>
<?php
if(!isset($_GET['id'])){
header('Location: index.php');
	die();
}

if(($_GET['id'] == 1) or ($_GET['id'] == 3) or ($_GET['id'] == 2) or ($_GET['id'] == 4) or ($_GET['id'] == 5)){
}else{
	header('Location: index.php');
	die();
}




?>




<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<meta content='width=device-width, initial-scale=1' name='viewport'/>
</head>
<body>
<div class="container">
<form method="post" action="action.php">
    <div class="form-group">
        <label for="inputPassword">Type</label>
    <select style="height:100px"  name="c_type" class="form-control ">
      <option selected value="1">Outflow</option>
      <option  value="2">Inflow</option>
    </select>  
      </div>

    <div class="form-group">
        <label for="inputEmail">Description</label>
        <input style="height:100px" type="text" autofocus name="c_desc" class="form-control" id="inputEmail" placeholder="Description">
    </div>
    <div class="form-group">
        <label for="inputPassword">Amount</label>
        <input style="height:100px"  type="number" step="0.01" name="c_amount" class="form-control" id="inputPassword" placeholder="Amount">
    </div>
      <input type="hidden" name="c_mode" value="<?php echo $_GET['id'] ?>" />

 <input align="middle" input style="height:100px; width:100%"  type="submit" class="btn btn-success btn-lg" name="c_add" value="Submit" />
</form>
</div>
</body></html>