<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<meta content='width=device-width, initial-scale=1' name='viewport'/>
</head>
<body>
<?php
if(isset($_GET['a'])){
 ?>
<div align="center" class="row" style="background-color:rgba(149,251,167,1.00)">
Added
</div>
<?php } ?>

<div class="container zoom">

<div class="row">
	<div align="center" class=" col-xs-12 col-md-6">
    	<a href="card_t.php?id=5"><img class="img-responsive" src="monzo.png" /></a><hr>
    </div>
	<div align="center" class="col-xs-12 col-md-6">
    	<a href="card_t.php?id=4"><img class="img-responsive" src="hsbc.jpg" /></a><hr>
    </div>
</div>
<div class="row">
	<div align="center" class="col-xs-12 col-md-6">
    	<a href="card_t.php?id=1"><img class="img-responsive" src="alansari.jpg" /></a><hr>
    </div>
	<div align="center" class="col-xs-12 col-md-6">
    	<a href="card_t.php?id=3"><img class="img-responsive" src="rakbank.png" /></a><hr>
    </div>
</div>


<div class="row">
	<div align="center" class="col-md-4 col-md-offset-4 col-md-8 ">
    	<a href="card_t.php?id=2"><img class="img-responsive" src="pound.jpg" /></a><hr>
    </div>
</div>


</div>




<a href="cashflow.php"><div align="center" class="row" style="background-color:rgba(255,147,149,1.00)">
<button style="height:10em; width:100%; font-size:3em" class="btn btn-lg">Cashflow</button>
</div>
</a>

</body>
</html>
