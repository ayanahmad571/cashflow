<?php

include("include.php");
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<style>
 body{
	 font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	 background-color:rgba(0,0,0,1.00);
	 
 }
</style>
</head>
<body>


<div class="row">
<div class="col-xs-12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Debit</th>
          <th scope="col">Credit</th>
          <th scope="col">Currency</th>
          <th scope="col">Date/Time</th>
          <th scope="col">Method</th>
        </tr>
      </thead>
      <tbody>

<?php
	$balance = 0;

$sql = "SELECT * FROM `c_transactions` t 
left join c_type ty on t.t_ty_id = ty.ty_id
left join c_mode m on t.t_m_id = m.m_id 
left join c_currency c on t.t_cur_id = c.cur_id

where t.t_user_id =1
order by t_dnt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$i = 1; 
	$balance = 0;
    while($row = $result->fetch_assoc()) {
?>
<?php
if($row['t_ty_id'] == 1){
$balance = $balance - $row['t_amount'];
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
$balance = $balance + $row['t_amount'];

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
	<tr  style="background-color:rgba(197,197,197,1.00)">
        <th colspan="2" scope="row">
        </th>
        <td colspan="2">
        <h3><i><u><?php echo $balance ?></u></i></h3>
        </td>
        <td colspan="3">
        <h3>Closing Balance</h3>
        </td>
    </tr>
      </tbody>
    </table>
    
</div>
</div>
<br>
<br>
<a href="index.php"><div align="center" class="row" style="background-color:rgba(253,157,73,1.00)">
<button style="height:10em; width:100%; font-size:3em" class="btn btn-primary btn-lg">Add Transaction</button>
</div>
</a>
</body>
</html>
