<?php

$filename = 'csv-database-manual.csv';

if (file_exists($filename)) {
    echo "O arquivo $filename existe";
    unlink('csv-database-manual.csv');
} else {
    echo "O arquivo $filename nao existe";
}


$con=mysqli_connect("localhost","robot659_retailanalysis","retailanalysis2017","robot659_retailanalysis");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,'TRUNCATE robot659_retailanalysis.modelo;');

?>

<html>

<body>
<br><br><br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
</form>

</body>
</html>