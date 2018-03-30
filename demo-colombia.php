<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<font face="arial">
<?php


// Se não pegar nada interessante, reforçar pra inputar "Not indentified" e no select colocar um brand!="Not indentified"


function analysis_line($funcao_category,$funcao_retailer,$funcao_type) {

$con=mysqli_connect("baixarseguro.com.br","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,'SELECT COUNT(brand) AS brandtopads, ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Colombia" AND category="' . $funcao_category . '" AND retailer="' . $funcao_retailer . '" AND type="' . $funcao_type . '" AND device="Desktop" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY brand, target_url ORDER BY COUNT(brand) DESC LIMIT 1;');

while($row = mysqli_fetch_array($result))
{
	$proxima = $row;
}


$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Colombia" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 1;');

while($row = mysqli_fetch_array($result))
{
$retailer = $row['retailer'];
$category = $row['category'];
$brand = $row['brand'];
$product = $row['product'];
$position = $row['position'];
$type = $row['type'];
$place = $row['place'];
$page_type = $row['page_type'];
$dateone = $row['DATE_IMPORT'];
$pricefrom = $row['price_from'];
$priceto = $row['price'];
$ad_type = $row['ad_type'];
$proxima = $row;
}

$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Colombia" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 50;');

while($row = mysqli_fetch_array($result))
{
$datetwo = $row['DATE_IMPORT'];
$proxima = $row;
}

$dateone = date('M jS',mktime(0, 0, 0, substr($dateone, -14, 2), substr($dateone, -11, 2), 0));
$datetwo = date('jS',mktime(0, 0, 0, substr($datetwo, -14, 2), substr($datetwo, -11, 2), 0));
$position = date('jS',mktime(0, 0, 0, 0, $position, 0));

echo "	• " . $category . ": " . ucfirst(strtolower($brand)) . " " . $product . " featured at " . $position . " ";
if($place == 'Listagem') echo "organic"; else echo strtolower($place);
echo " position on " . strtolower($page_type) . " page, from " . $dateone . " to " . $datetwo . ". Displayed as " . strtolower($ad_type);
if($pricefrom == true) echo ", price from " . $pricefrom . " to " . $priceto . ".<br>"; else echo ".<br>";
echo "<font color='#FFFFFF'><b>Banner referente:</b> <small>" . $proxima['image'] . "</small></font><br>";

mysqli_close($con);

}
echo "<br>";
echo "<h1>Principais marcas em Ads</h1>";

echo "<b>Ad</b>";
echo "<br><br><b>	• Alkosto:</b><br>";

analysis_line("Smartphone","Alkosto","Ad");
analysis_line("TV","Alkosto","Ad");
analysis_line("Washing Machine","Alkosto","Ad");
analysis_line("Refrigerator","Alkosto","Ad");

echo "<br><br><b>	• Exito:</b><br>";

analysis_line("Smartphone","Exito","Ad");
analysis_line("TV","Exito","Ad");
analysis_line("Washing Machine","Exito","Ad");
analysis_line("Refrigerator","Exito","Ad");

echo "<br><br><b>	• Falabella:</b><br>";

analysis_line("Smartphone","Falabella","Ad");
analysis_line("TV","Falabella","Ad");
analysis_line("Washing Machine","Falabella","Ad");
analysis_line("Refrigerator","Falabella","Ad");

echo "<br><br><b>	• Jumbo:</b><br>";

analysis_line("Smartphone","Jumbo","Ad");
analysis_line("TV","Jumbo","Ad");
analysis_line("Washing Machine","Jumbo","Ad");
analysis_line("Refrigerator","Jumbo","Ad");

echo "<br><br><br>";
echo "<h1>Principais marcas no Orgânico</h1>";
echo "<b>Organic</b>";
echo "<br><br><b>	• Alkosto:</b><br>";

analysis_line("Smartphone","Alkosto","Organic");
analysis_line("TV","Alkosto","Organic");
analysis_line("Washing Machine","Alkosto","Organic");
analysis_line("Refrigerator","Alkosto","Organic");

echo "<br><br><b>	• Exito:</b><br>";

analysis_line("Smartphone","Exito","Organic");
analysis_line("TV","Exito","Organic");
analysis_line("Washing Machine","Exito","Organic");
analysis_line("Refrigerator","Exito","Organic");

echo "<br><br><b>	• Falabella:</b><br>";

analysis_line("Smartphone","Falabella","Organic");
analysis_line("TV","Falabella","Organic");
analysis_line("Washing Machine","Falabella","Organic");
analysis_line("Refrigerator","Falabella","Organic");

echo "<br><br><b>	• Jumbo:</b><br>";

analysis_line("Smartphone","Jumbo","Organic");
analysis_line("TV","Jumbo","Organic");
analysis_line("Washing Machine","Jumbo","Organic");
analysis_line("Refrigerator","Jumbo","Organic");


?>

<br><br><br>
<h1>mysqli_query exemplo:</h1>

<br>
SELECT COUNT(brand) AS brandtopads,<br>
ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from<br>
<br>
FROM modelo<br>
<br>
WHERE country="Colombia" AND<br>
category="TV" AND<br>
retailer="Alkosto" AND<br>
type="Organic" AND<br>
DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59"<br>
<br>
GROUP BY brand, target_url<br>
<br>
ORDER BY COUNT(brand)<br>
<br>
DESC LIMIT 1;<br>

<?php

echo "<br><br><br>";
echo "<h1>Script bat para baixar os banners e zipar</h1>";
echo "<br>";




$con=mysqli_connect("baixarseguro.com.br","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo '<br><br>cd "C:\Users\wsantos\Documents\wget-win\bin"<br><br>';
echo "<br><br>REM <b>Alkosto Banners</b><br>";

$result = mysqli_query($con,'SELECT image, retailer FROM modelo WHERE country="Colombia" AND retailer="Alkosto" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
$img_virgula = explode("; ", $row['image']);
echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
if ($img_virgula['1'] == TRUE) echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
$banners1 = $row;
}


echo "<br><br>REM <b>Exito Banners</b><br>";

$result = mysqli_query($con,'SELECT image, retailer FROM modelo WHERE country="Colombia" AND retailer="Exito" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
$img_virgula = explode("; ", $row['image']);
echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
if ($img_virgula['1'] == TRUE) echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
$banners2 = $row;
}

echo "<br><br>REM <b>Falabella Banners</b><br>";

$result = mysqli_query($con,'SELECT image, retailer FROM modelo WHERE country="Colombia" AND retailer="Falabella" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
$img_virgula = explode("; ", $row['image']);
echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
if ($img_virgula['1'] == TRUE) echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
$banners3 = $row;
}


echo "<br><br>REM <b>Jumbo Banners</b><br>";

$result = mysqli_query($con,'SELECT image, retailer FROM modelo WHERE country="Colombia" AND retailer="Jumbo" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
$img_virgula = explode("; ", $row['image']);
echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
if ($img_virgula['1'] == TRUE) echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
$banners4 = $row;
}


echo '<br><br><br><br>';
echo 'cd "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $banners1['retailer'] . '"<br>';
echo 'rename * *.jpg<br>';
echo 'cd "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $banners2['retailer'] . '"<br>';
echo 'rename * *.jpg<br>';
echo 'cd "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $banners3['retailer'] . '"<br>';
echo 'rename * *.jpg<br>';
echo 'cd "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $banners4['retailer'] . '"<br>';
echo 'rename * *.jpg<br>';



?>


<!-- CATEGORY: BRAND PRODUCT featured at ORDINAL organic carousel ad midi position on page, from DATEONE to DATETWO. Price from $$$ to $$$ as an AD_TYPE. -->
</font>
</body>
</html>