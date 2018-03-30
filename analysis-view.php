<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php


//PRIMEIRA FUNCAO

function analysis_line($funcao_category,$funcao_retailer,$funcao_type) {

$con=mysqli_connect("localhost","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,'SELECT COUNT(brand) AS brandtopads, ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Peru" AND category="' . $funcao_category . '" AND retailer="' . $funcao_retailer . '" AND type="' . $funcao_type . '" AND product!="Not Identified" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY brand, target_url ORDER BY COUNT(brand) DESC LIMIT 1;');

while($row = mysqli_fetch_array($result))
{
	$proxima = $row;
}


$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Peru" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 1;');

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

$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Peru" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 50;');

while($row = mysqli_fetch_array($result))
{
$datetwo = $row['DATE_IMPORT'];
$proxima = $row;
}

$dateone = date('M jS',mktime(0, 0, 0, substr($dateone, -14, 2), substr($dateone, -11, 2), 0));
$datetwo = date('jS',mktime(0, 0, 0, substr($datetwo, -14, 2), substr($datetwo, -11, 2), 0));
$position = date('jS',mktime(0, 0, 0, 0, $position, 0));

echo "	• " . $category . ": " . ucfirst(strtolower($brand)) . " " . $product . " featured at " . $position . " " . strtolower($place) . " position on " . strtolower($page_type) . " page, from " . $dateone . " to " . $datetwo . ". Displayed as " . strtolower($ad_type);
if($pricefrom == true) echo ", price from " . $pricefrom . " to " . $priceto . ".<br>"; else echo ".<br>";
echo "<small>Banner: " . $proxima['image'] . "</small><br>";

mysqli_close($con);

}


//PRIMEIRA FUNCAO






//ESPECIFICA MARCA FUNCAO

function analysis_brand($funcao_category,$funcao_retailer,$funcao_type,$funcao_brand) {

$con=mysqli_connect("localhost","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,'SELECT COUNT(brand) AS brandtopads, ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Peru" AND category="' . $funcao_category . '" AND retailer="' . $funcao_retailer . '" AND type="' . $funcao_type . '" AND brand="' . $funcao_brand . '" AND product!="Not Identified" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY brand, target_url ORDER BY COUNT(brand) DESC LIMIT 1;');

while($row = mysqli_fetch_array($result))
{
	$proxima = $row;
}


$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Peru" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 1;');

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

$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="Peru" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 50;');

while($row = mysqli_fetch_array($result))
{
$datetwo = $row['DATE_IMPORT'];
$proxima = $row;
}

$dateone = date('M jS',mktime(0, 0, 0, substr($dateone, -14, 2), substr($dateone, -11, 2), 0));
$datetwo = date('jS',mktime(0, 0, 0, substr($datetwo, -14, 2), substr($datetwo, -11, 2), 0));
$position = date('jS',mktime(0, 0, 0, 0, $position, 0));

echo "	• " . $category . ": " . ucfirst(strtolower($brand)) . " " . $product . " featured at " . $position . " " . strtolower($place) . " position on " . strtolower($page_type) . " page, from " . $dateone . " to " . $datetwo . ". Displayed as " . strtolower($ad_type);
if($pricefrom == true) echo ", price from " . $pricefrom . " to " . $priceto . ".<br>"; else echo ".<br>";
echo "<small>Banner: " . $proxima['image'] . "</small><br>";

mysqli_close($con);

}


//ESPECIFICA MARCA FUNCAO



// IMPRIME


echo "<b>Ad</b>";
echo "<br><br><b>	• Falabella:</b><br>";

analysis_line("Smartphone","Falabella","Ad");
analysis_line("TV","Falabella","Ad");
analysis_line("Washing Machine","Falabella","Ad");
analysis_line("Refrigerator","Falabella","Ad");

echo "<br><br><b>	• Ripley:</b><br>";

analysis_line("Smartphone","Ripley","Ad");
analysis_line("TV","Ripley","Ad");
analysis_line("Washing Machine","Ripley","Ad");
analysis_line("Refrigerator","Ripley","Ad");

echo "<br><br><b>	• ESPECIFICA BRAND:</b><br>";

analysis_brand("Smartphone","Falabella","Ad","Asus");



$con=mysqli_connect("localhost","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo '<br><br>cd "C:\Users\wsantos\Documents\wget-win\bin"<br><br>';
echo "<br><br>REM <b>Falabella Banners</b><br>";

$result = mysqli_query($con,'SELECT image, retailer FROM modelo WHERE country="Peru" AND retailer="Falabella" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
$img_virgula = explode("; ", $row['image']);
echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
if ($img_virgula['1'] == TRUE) echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
$banners1 = $row;
}


echo "<br><br>REM <b>Ripley Banners</b><br>";

$result = mysqli_query($con,'SELECT image, retailer FROM modelo WHERE country="Peru" AND retailer="Ripley" AND type="Ad" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY image;');

while($row = mysqli_fetch_array($result))
{
$img_virgula = explode("; ", $row['image']);
echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
if ($img_virgula['1'] == TRUE) echo 'wget -P "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $row['retailer'] . '" --no-check-certificate ' . $img_virgula['0'] . '<br>';
$banners2 = $row;
}


echo '<br><br><br><br>';
echo 'cd "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $banners1['retailer'] . '"<br>';
echo 'rename * *.jpg<br>';
echo 'cd "C:\Users\wsantos\Desktop\Banners-%date:~6,4%-%date:~3,2%-%date:~0,2%_%time:~0,2%h\Banners_' . $banners2['retailer'] . '"<br>';
echo 'rename * *.jpg<br>';






echo "<b>Organic</b>";
echo "<br><br><b>	• Falabella:</b><br>";

analysis_line("Smartphone","Falabella","Organic");
analysis_line("TV","Falabella","Organic");
analysis_line("Washing Machine","Falabella","Organic");
analysis_line("Refrigerator","Falabella","Organic");

echo "<br><br><b>	• Ripley:</b><br>";

analysis_line("Smartphone","Ripley","Organic");
analysis_line("TV","Ripley","Organic");
analysis_line("Washing Machine","Ripley","Organic");
analysis_line("Refrigerator","Ripley","Organic");




?>


<!-- CATEGORY: BRAND PRODUCT featured at ORDINAL organic carousel ad midi position on page, from DATEONE to DATETWO. Price from $$$ to $$$ as an AD_TYPE. -->
<!-- ANALYTICS VIEW, position + "porque a marca x teve forte presença em AD_TYPE" -->
<!-- banners ANALYTICS VIEW filtra ad? -->
<!-- texto geral, marca tal teve forte presença nessa semana (percentual) -->
<!-- criar função que dê pora inserir tudo de tudo (pra pedidos customizzadops) -->
<!-- se não pegar nada interessante, reforçar pra inputar "Not indentified" e no select colocar um brand!="Not indentified" -->
<!-- switch que tira samsung e LG -->

</body>
</html>