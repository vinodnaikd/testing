<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4281f5;
  color: white;
}
label{
		color:#4281f5;
		display:inline-block;
		}
    .list1{
      margin-left: 60%;
      margin-top: -18%;
    }
    .list2{
      margin-left: 15%;
      margin-top: -18%;
    }
    .list3{
      margin-left: 70%;
      margin-top: -18%;
    }
</style>
</head>
<body>
<?php
//print_r($data);
?>
<h1 >Account Statement</h1>
<center><h3 style="color:#4281f5;padding: 1%;margin-top:-6%;">Report as on<?=date("j F, Y");?></h3></center>
<img style="float:right;margin-top:-6%;"  style="padding-top:10px" src="http://dev-app.savingsmanager.co.in/assets/images/savings-manager-logo.png" />
<hr style="clear:both;height:3px;background-color:black;">
<div style="flex-grow: 0;">
	<ul style="list-style-type:none">
		<li><label>Name </label></li>
		<li><label>Permanent Account Number </label></li>
		<li><label>E-mail ID </label></li>
		<li><label>Mobile </label></li>
		<li><label>Address </label></li>

  </ul>
  </div>
  <div class="list2">
<ul style="list-style-type:none">
    <li>: <?php  if (isset($accountData['user']['0']['firstname'])) {
      echo $accountData['user']['0']['firstname'];
    } ?></li>
    <li>: <?php  if (isset($accountData['user']['0']['pannumber'])) {
      echo $accountData['user']['0']['pannumber'];
    } ?></li>
    <li>: <?php  if (isset($accountData['user']['0']['email'])) {
      echo $accountData['user']['0']['email'];
    } ?></li>
    <li>: <?php  if (isset($accountData['user']['0']['mobileno'])) {
      echo $accountData['user']['0']['mobileno'];
    } ?></li>
    <li>: <?php  if (isset($accountData['user']['0']['address1'])) {
      echo $accountData['user']['0']['address1'];
    } ?></li>


  </ul>
  </div>
  <div class="list1">
    <ul style="list-style-type:none">
    <li><label>Broker Name </label></li>
    <li><label>ARN</label></li>
    <li><label>Contact Person </label></li>
    <li><label>Contact Number </label></li>
    <li><label>E-mail ID </label></li>


  </ul>
</div>

  <div class="list3">
  <ul style="list-style-type:none">
    <li>: </li>
    <li>: </li>
    <li>:</li>
    <li>:</li>
    <li>: </li>

  </ul>
  </div>
<hr style="height:1.5px;background-color:black;">
<h2><?php echo $accountData['user']['0']['firstname'];?></h2>
Birla SL Tax Relief '96(G) - Equity [1015447155]<br><br></p>
  <table id="customers">

    <thead>
    	  <tr>
            <th>Date</th>
            <th>Transcation Type</th>
            <th>Amount</th>
            <th>Units</th>
            <th>Price</th>
            <th>Unit Balance</th>

      </tr>
      <?php
      $total_sum=[];
      foreach ($accountData['port'] as $key => $value) {
         $total_sum[]=$value['units'];
        ?>
        <tr>
          <td><?=$value['transactiondate']?></td>
          <td> <?=($value['purchasetype'] == 'L')?'Lumpsum':'Sip'?></td>
          <td><?=$value['investmentamount']?></td>
          <td><?=$value['units']?></td>
          <td><?=$value['purchasenavvalue']?></td>
        </tr>
         <?php
        }
        ?>

      <tr style="background:skyblue;
          color: blue;"
      }>
      <td>Total</td>
      <td></td>
      <td></td>
      <td><?php echo array_sum ($total_sum ); ?></td>
      <td></td>
      <td></td>
      </tr>
      	  <tr>
      	  <td>Grand Total</td>
          <td></td>
          <td></td>
          <td><?php echo array_sum ($total_sum ); ?></td>
          <td></td>
          <td></td>
          </tr>

    </table>
	<h3>Disclaimer :</h3>
	<div style="border:1px solid black;padding-bottom:30px;">
	<ol><li>Ventura Securities Limited has taken utmost care to ensure the correctness and accuracy of the data contained in this Report. However, since it relies on third party for the data ,
	   possibility of errors cannot be ruled out. In the event, you observe any discrepancy, please e-mail to us at mfcustomercare@ventura1.com.</li>
	   <li>Returns for all equity oriented schemes (period of holding LESS than ONE year) are Absolute. Returns for all debt schemes/Monthly Income Plans (period of holding LESS than ONE year) are
	   Annualized. Returns for all schemes (period of holding MORE than ONE year) are CAGR.</li>
	  <li>Returns in Systematic Investment Plans (SIP) and multiple investments are best considered on the basis of XIRR.</li>
	  <li>For debt schemes, the returns are calculated considering the entire transaction including the partial redemption amount.</li>
	  <li>For debt schemes, the returns are calculated considering the entire transaction including the partial redemption amount.</li>
	  <li>For debt schemes, the returns are calculated considering the entire transaction including the partial redemption amount.</li>
	   <li> For an equity scheme, the returns may not reflect the correct %age due to partial redemptions.</li></ol>

	</div>

</body>
</html>
