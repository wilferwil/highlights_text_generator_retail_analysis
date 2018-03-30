<?php
// Nas versões do PHP anteriores a 4.1.0, $HTTP_POST_FILES deve ser utilizado ao invés
// de $_FILES.

$uploaddir = './';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
    header('Location: ./load_csv_into.php');

} else {
    echo "Possível ataque de upload de arquivo!<br>";
}

?>