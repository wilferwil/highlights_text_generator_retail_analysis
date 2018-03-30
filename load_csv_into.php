<?php

//CONEXAO COM BANCO DE DADOS

$conn = new mysqli("localhost", "robot659_retailanalysis", "retailanalysis2017", "robot659_retailanalysis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ETAPA DE IMPORTACAO DOS CSV

$sql="LOAD DATA LOCAL INFILE 'csv-database-manual.csv' INTO TABLE modelo CHARACTER SET latin1 FIELDS TERMINATED BY ';' ENCLOSED BY '\"' LINES TERMINATED BY '\r\n' IGNORE 1 LINES (date_import,gtime,country,retailer,device,page_type,keyword,place,position,image,target_url,type,category,brand,product,title,detail,call_to_action,price,price_from,price_install,ad_type,ad_type_detail)";


if(mysqli_query($conn,$sql) == true) header('Location: ./analyzer-selector.html');
else echo 'nao foi';

?>