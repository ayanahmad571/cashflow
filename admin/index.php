<!DOCTYPE html>
<html lang="en">
<?php
include("../include.php");
$time_until_when = time();
if(isset($_GET['cash'])){
	$extra = 'and t_m_id = 2';
}else if(isset($_GET['hsbc'])){
	$extra = 'and  t_m_id = 4';
}else if(isset($_GET['monzo'])){
	$extra = 'and  t_m_id = 5';
}else if(isset($_GET['alansari'])){
	$extra = 'and  t_m_id = 1';
}else if(isset($_GET['rak'])){
	$extra = 'and  t_m_id = 3';
}else {
	$extra = '';
}
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cash-Flow Ayan Ahmad</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Cash Flow Statement</a>





  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <span>Dashboard</span>
        </a>
        <a class="nav-link" href="../">
          <span>Software</span>
        </a>
        <a class="nav-link" href="transfer.php">
          <span>Transfer</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Static Daily Budget</div>
<?php

$ocash = getdatafromsql($conn, "SELECT ifnull(sum(t_amount),0) as abcd FROM `c_transactions` where  t_ty_id = 1 and t_dnt > ".(strtotime("today")));
$ecash= getdatafromsql($conn, "SELECT ifnull(sum(t_amount),0) as abcd FROM `c_transactions` where   t_ty_id = 2 and t_dnt > ".(strtotime("today")));
$mecash = getdatafromsql($conn, "SELECT ifnull(sum(t_amount),0) as abcd FROM `c_transactions` where   t_ty_id = 2 and t_dnt > ".(strtotime("1-".date('M-Y', $time_until_when))));



$budgpd = 20;

?>
               <?php
			  if(is_array($ocash)){
$num = round($ocash['abcd'],3);

if($num > $budgpd){
?>
			    <h1 style="color:rgba(240,50,50,1.00)"><?php echo $num; ?> / <?php echo $budgpd; ?> (<?php echo ($budgpd-$num); ?>) GBP</h1>

<?php
}else{
	?>
			    <h1 ><?php echo $num; ?> / <?php echo $budgpd; ?> (<?php echo ($budgpd-$num); ?>) GBP</h1>
    
    <?php
	
}

}else {echo "20 GBP";}
			  ?>
              <h1>Earnt: <?php  echo $ecash['abcd'] ;?> GBP</h1>
              </div>
              <a href="index.php?cash" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Dynamic Daily Budget</div>
 <?php

$mcash = getdatafromsql($conn, "SELECT ifnull(sum(t_amount),0) as abcd FROM `c_transactions` where  t_ty_id = 1 and t_dnt > ".(strtotime("1-".date('M-Y', $time_until_when))));
$calda = cal_days_in_month(CAL_GREGORIAN, (int)date("m",$time_until_when), (int)date("Y", $time_until_when));
$budgpm = $budgpd * $calda;
echo $calda;

			  if(is_array($mcash) and is_array($ocash)){
$num2 = round($mcash['abcd'],3	);

if((int)date("d", $time_until_when) == $calda){
	$bal = round(($budgpm-$num2),2);

}else{
	$bal = round(($budgpm-$num2)/($calda +1 -(int)date("d", $time_until_when)),2);

}

if($num2 > $bal){
?>
			    <h1 style="color:rgba(240,50,50,1.00)"><?php echo $num; ?> / <?php echo $bal; ?> (<?php echo ($bal-$num); ?>) GBP</h1>

<?php
}else{
	?>
			    <h1 ><?php echo $num; ?> / <?php echo $bal; ?> (<?php echo ($bal-$num); ?>) GBP</h1>
    
    <?php
	
}

}
			  ?>
                            <h1>Earnt: <?php echo $ecash['abcd'] ?> GBP</h1>

             </div>
              <a href="index.php?hsbc" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Monthly Budget</div>
 <?php

$m2cash = getdatafromsql($conn, "SELECT ifnull(sum(t_amount),0) as abcd FROM `c_transactions` where  t_ty_id = 1 and t_dnt > ".(strtotime("1-".date('M-Y', $time_until_when))));


			  if(is_array($m2cash ) and is_array($ocash)){
$num22 = round($m2cash['abcd'],3	);

if($num22 > $budgpm){
?>
			    <h1 style="color:rgba(240,50,50,1.00)"><?php echo $num22; ?> / <?php echo $budgpm; ?> (<?php echo ($budgpm-$num22); ?>) GBP</h1>

<?php
}else{
	?>
			    <h1 ><?php echo $num22; ?> / <?php echo $budgpm; ?> (<?php echo ($budgpm-$num22); ?>) GBP</h1>
    
    <?php
	
}

}
			  ?>
                            <h1>Earnt: <?php echo $mecash['abcd'] ?> GBP</h1>
             </div>
              <a href="index.php?hsbc" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

        </div>






        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Cash</div>
<?php

$cash[0] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 2 and t_ty_id = 2 group by t_ty_id");
$cash[1] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 2 and t_ty_id = 1 group by t_ty_id");
$cash[2] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_from_m_id = 2  group by tf_from_m_id");
$cash[3] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_to_m_id = 2  group by tf_to_m_id");
?>
                <h1><?php echo $cash[0]['abcd'] - $cash[1]['abcd'] -  $cash[2]['abcd'] +  $cash[3]['abcd']?> GBP</h1>
              </div>
              <a href="index.php?cash" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">HSBC Debit</div>
 <?php

$hsbc[0] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 4 and t_ty_id = 2 group by t_ty_id");
$hsbc[1] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 4 and t_ty_id = 1 group by t_ty_id");
$hsbc[2] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_from_m_id = 4  group by tf_from_m_id");
$hsbc[3] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_to_m_id = 4  group by tf_to_m_id");
?>                <h1><?php echo $hsbc[0]['abcd'] - $hsbc[1]['abcd'] -  $hsbc[2]['abcd'] +  $hsbc[3]['abcd']?> GBP</h1>
             </div>
              <a href="index.php?hsbc" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Monzo Debit</div>
 <?php

$monz[0] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 5 and t_ty_id = 2 group by t_ty_id");
$monz[1] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 5 and t_ty_id = 1 group by t_ty_id");
$monz[2] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_from_m_id = 5  group by tf_from_m_id");
$monz[3] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_to_m_id = 5  group by tf_to_m_id");
?>                <h1><?php echo $monz[0]['abcd'] - $monz[1]['abcd'] -  $monz[2]['abcd'] +  $monz[3]['abcd']?> GBP</h1>
             </div>
              <a href="index.php?monzo" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Al Ansari</div>
 <?php

$alans[0] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 1 and t_ty_id = 2 group by t_ty_id");
$alans[1] = getdatafromsql($conn, "SELECT sum(t_amount) as abcd FROM `c_transactions` where  t_m_id = 1 and t_ty_id = 1 group by t_ty_id");
$alans[2] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_from_m_id = 1  group by tf_from_m_id");
$alans[3] = getdatafromsql($conn, "SELECT sum(tf_amount) as abcd FROM `c_transfers` where  tf_to_m_id = 1  group by tf_to_m_id");
?>                <h1><?php echo $alans[0]['abcd'] - $alans[1]['abcd'] -  $alans[2]['abcd'] +  $alans[3]['abcd']?> GBP</h1>
             </div>
              <a href="index.php?alansari" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-12 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Assets</div>
                <h1><?php echo ($cash[0]['abcd']+$alans[0]['abcd']+$hsbc[0]['abcd']+$monz[0]['abcd']) - ($cash[1]['abcd']+$alans[1]['abcd']+$hsbc[1]['abcd']+$monz[1]['abcd']) ?> GBP</h1>
             </div>
                           <a href="index.php?" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Last 7 days out/in Flows</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
          <th >#</th>
          <th >Name</th>
          <th >Debit</th>
          <th >Credit</th>
          <th >Currency</th>
          <th >Date/Time</th>
          <th >Method</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
          <th >#</th>
          <th >Name</th>
          <th >Debit</th>
          <th >Credit</th>
          <th >Currency</th>
          <th >Date/Time</th>
          <th >Method</th>
                  </tr>
                </tfoot>
                <tbody>



<?php
	$balance = 0;

$sql = "SELECT * FROM `c_transactions` t 
left join c_type ty on t.t_ty_id = ty.ty_id
left join c_mode m on t.t_m_id = m.m_id 
left join c_currency c on t.t_cur_id = c.cur_id

where t.t_user_id =1 
".$extra."
and t.t_dnt > ".($time_until_when - 604801)."
order by t_dnt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$i = 1; 
    while($row = $result->fetch_assoc()) {
?>
<?php
if($row['t_ty_id'] == 1){
?>

        <tr style="background-color:rgba(255,156,158,1.00)">
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $row['t_desc'];  ?></td>
         

          <td><?php echo $row['t_amount'];  ?></td>
          <td>-</td>

         
          <td><?php echo $row['cur_desc'];  ?></td>
          <td><?php echo date('D, d-M-Y @ h:i:s A',$row['t_dnt']);  ?></td>
          <td><?php echo $row['m_desc'];  ?></td>
        </tr>

<?php }else{ 

?>
        <tr style="background-color:rgba(144,255,184,1.00)">
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $row['t_desc'];  ?></td>
         

          <td>-</td>
          <td><?php echo $row['t_amount'];  ?></td>

         
          <td><?php echo $row['cur_desc'];  ?></td>
          <td><?php echo date('D, d-M-Y @ h:i:s A',$row['t_dnt']);  ?></td>
          <td><?php echo $row['m_desc'];  ?></td>
        </tr>

<?php
}

$i++;

    }
} else {
    echo "0 results";
}


?>
    
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © 2019 AYAN</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



</body>

</html>
