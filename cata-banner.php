<?php

$con=mysqli_connect("baixarseguro.com.br","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,'SELECT image FROM input01 WHERE country="' . $_GET['country'] . '" AND retailer="' . $_GET['retailer'] . '" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
echo "<img src='" . $row['image'] . "'><br>";
}


?>