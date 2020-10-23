<?php 
include("../include.php");

if(isset($_POST['amt']) && isset($_POST['fr']) && isset($_POST['to'])){
	

	if(!is_numeric($_POST['amt'])){die('Amount must be numeric');}	
	if(!is_numeric($_POST['fr'])){die('fr must be numeric');}	
	if(!is_numeric($_POST['to'])){die('to must be numeric');}	

		$sql = "
	
	INSERT INTO `c_transfers`(`tf_from_m_id` ,`tf_to_m_id` , `tf_amount`, `tf_usr_id`, `tf_dnt`) VALUES (
	'".$_POST['fr']."',
	'".$_POST['to']."',
	'".$_POST['amt']."',
	'1',
	'".time()."'
	)
	";
	
	
	if($conn->query($sql)){
		header('Location: index.php?');
	}else{
		die($conn->error);
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Transfer Money</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">From where to where?</div>
      <div class="card-body">
        <form action="transfer.php" method="post">
          <div class="form-group">
            <div class="form-row">
            <h4 style="color:red">1ansari,2cash,3rak,4hsbc,5monzo</h4><br>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="fr" type="number" id="firstName" value="4" class="form-control" placeholder="1ansari,2cash,3rak,4hsbc,5monzo" required="required" autofocus>
                  <label for="firstName">From</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="to" type="number" id="num1ber" value="5" class="form-control" placeholder="1ansari,2cash,3rak,4hsbc,5monzo" required="required">
                  <label for="num1ber">To</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="amt" type="number" id="inputAmount" class="form-control" step="0.01" placeholder="100.2" value="200" required="required">
              <label for="inputAmount">Amount</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" href="login.html" type="submit">Transfer</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
