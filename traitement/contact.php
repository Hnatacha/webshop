<?php
include '../config.php';
if ($_POST) {



$Nom = $_POST['Nom'];
$Email = $_POST['Email'];
$Message = $_POST['Message'];




$sqlCheckEmail = "SELECT Email FROM inscription WHERE Email='$Email'";
$existEmail = $bdd->query($sqlCheckEmail);



if(mysqli_num_rows($existEmail) > 0){
echo "<font color='red'>Data already exist.";
echo "<br/><a href='index.php'>View Result</a>";
}else{
$addRegisterSql = "INSERT INTO contact(Nom,Email,Message)
VALUES('$Nom','$Email','$Message)";

$result = $bdd->query($addRegisterSql);

if ($result == TRUE) {
echo "<font color='green'>Data added successfully.";
echo "<br/><a href='index.php'>View Result</a>";
} else {
echo "<br/><a href='index.php'>View Result</a>";
echo "Error:" . $sql . "<br>" . $conn->error;
}
}
}


?>