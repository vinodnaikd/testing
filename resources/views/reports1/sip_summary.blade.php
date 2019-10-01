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
  background-color: #ff9800;
  color: white;
}
</style>
</head>
<body>
<table id="customers">
  <tr>
    <th>Scheme Name</th>
    <th>Folio Number</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Ceaase Date</th>
    <th>Frequency</th>
    <th>Sip Installment Amount</th>
    <th>Total Invested Value</th>
    <th>Current Value</th>
    <th>Abs Returns(%)</th>
    <th>Latest Installment Date</th>
  </tr>
  <?php
  foreach ($sipsummaryData as $key => $value) {
    if($value['frequency'] == "Monthly")
      $frequency = "M";
    ?>
  <tr>
    <td><?=$value['fundname']?></td>
    <td><?=$value['folionumber']?></td>
    <td><?=$value['startdate']?></td>
    <td><?=$value['enddate']?></td>
    <td></td>
    <td><?=$frequency?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>
