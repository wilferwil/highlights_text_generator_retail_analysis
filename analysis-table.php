<html>

<head>

<meta charset="ISO-8859-1">

</head>

<body>

	<font face="arial">

<?php





//PRIMEIRA FUNCAO



function analysis_line($funcao_country,$funcao_category,$funcao_retailer,$funcao_type) {



$con=mysqli_connect("localhost","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}





$result = mysqli_query($con,'SELECT COUNT(brand) AS brandtopads, ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="' . $funcao_country . '" AND category="' . $funcao_category . '" AND retailer="' . $funcao_retailer . '" AND type="' . $funcao_type . '" AND product!="Not Identified" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY brand, target_url ORDER BY COUNT(brand) DESC LIMIT 1;');



while($row = mysqli_fetch_array($result))

{

	$proxima = $row;

}



$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="' . $funcao_country . '" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 1;');



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



$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE country="' . $funcao_country . '" AND category="' . $proxima['category'] . '" AND retailer="' . $proxima['retailer'] . '" AND type="' . $funcao_type . '" AND device="Desktop" AND brand="' . $proxima['brand'] . '" AND image="' . $proxima['image'] . '" AND DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" ORDER BY DATE_IMPORT ASC LIMIT 50;');



while($row = mysqli_fetch_array($result))

{

$datetwo = $row['DATE_IMPORT'];

$proxima = $row;

}



$dateone = date('M jS',mktime(0, 0, 0, substr($dateone, -14, 2), substr($dateone, -11, 2), 0));

$datetwo = date('jS',mktime(0, 0, 0, substr($datetwo, -14, 2), substr($datetwo, -11, 2), 0));

$position = date('jS',mktime(0, 0, 0, 0, $position, 0));



if($brand==TRUE) {

	

	echo "<tr><td>" . $category . "</td><td>" . $retailer . "</td><td>" . ucfirst(strtolower($brand)) . "</td><td>" . $product . "</td><td>" . $position . "</td><td>" . strtolower($place) . "</td><td>" . strtolower($page_type) . "</td><td>" . $dateone . "</td><td>" . $datetwo . "</td><td>" . strtolower($ad_type) . "</td><td>" . $pricefrom . "</td><td>" . $priceto . "</td><td><a target='_blank' href='" . $proxima['image'] . "'>IMG</a></td></tr>";

}



mysqli_close($con);



}





//PRIMEIRA FUNCAO







// IMPRIME





//echo "<b>Ad</b>";

//echo "<br><br><b>	• Falabella:</b><br>";

//

//analysis_line("Smartphone","Falabella","Ad");

//analysis_line("TV","Falabella","Ad");

//analysis_line("Washing Machine","Falabella","Ad");

//analysis_line("Refrigerator","Falabella","Ad");

//

//echo "<br><br><b>	• Ripley:</b><br>";

//

//analysis_line("Smartphone","Ripley","Ad");

//analysis_line("TV","Ripley","Ad");

//analysis_line("Washing Machine","Ripley","Ad");

//analysis_line("Refrigerator","Ripley","Ad");

//

//

//

//echo "<b>Organic</b>";

//echo "<br><br><b>	• Falabella:</b><br>";

//

//analysis_line("Smartphone","Falabella","Organic");

//analysis_line("TV","Falabella","Organic");

//analysis_line("Washing Machine","Falabella","Organic");

//analysis_line("Refrigerator","Falabella","Organic");

//

//echo "<br><br><b>	• Ripley:</b><br>";

//

//analysis_line("Smartphone","Ripley","Organic");

//analysis_line("TV","Ripley","Organic");

//analysis_line("Washing Machine","Ripley","Organic");

//analysis_line("Refrigerator","Ripley","Organic");









$con=mysqli_connect("localhost","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");

// Check connection

if (mysqli_connect_errno())

{

echo "Failed to connect to MySQL: " . mysqli_connect_error();

}





$result = mysqli_query($con,'SELECT ID, DATE_IMPORT, country, gtime, category, retailer, type, ad_type, brand, product, page_type, place, position, title, image, target_url, price, price_from FROM modelo WHERE DATE_IMPORT BETWEEN "' . $_GET['data-inicial'] . ' 00:00:00" AND "' . $_GET['data-final'] . ' 23:59:59" GROUP BY country,category,retailer,type;');



echo '<table border="1"><td><h2>Categoria</h2></td><td><h2>Retailer</h2></td><td><h2>Marca</h2></td><td><h2>Produto</h2></td><td><h2>Posicao</h2></td><td><h2>Place</h2></td><td><h2>Pagina</h2></td><td><h2>Data inicial</h2></td><td><h2>Data final</h2></td><td><h2>Ad_type</h2></td><td><h2>Price from</h2></td><td><h2>Price to</h2></td><td>IMG</td>';

while($row = mysqli_fetch_array($result))

{

	analysis_line($row['country'],$row['category'],$row['retailer'],$row['type']);

}

echo '</table>';



mysqli_close($con);







?>





<!-- CATEGORY: BRAND PRODUCT featured at ORDINAL organic carousel ad midi position on page, from DATEONE to DATETWO. Price from $$ to $$ as an AD_TYPE. -->

<!-- ANALYTICS VIEW, position + "porque a marca x teve forte presença em AD_TYPE" -->

<!-- banners ANALYTICS VIEW filtra ad? -->

<!-- texto geral, marca tal teve forte presença nessa semana (percentual) -->

<!-- criar função que dê pora inserir tudo de tudo (pra pedidos customizzadops) -->

<!-- se não pegar nada interessante, reforçar pra inputar "Not indentified" e no select colocar um brand!="Not indentified" -->

<!-- switch que tira samsung e LG -->

</font>

</body>

</html>