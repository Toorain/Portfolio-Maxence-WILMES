<?php 
$conn = new mysqli("localhost", "phpmyadmin", "admin", "table_test");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$nom = $_POST['name'];
$mail = $_POST['mail'];
$message = $_POST['message'];

$sql_items = "INSERT INTO Contact (NAME, mail, message) VALUES ('$nom', '$mail', '$message')";
$check_name = "SELECT id FROM Contact WHERE NAME = $nom AND Mail=$mail AND Message=$message";
if(empty($check_name)){
	if ($conn -> query($sql_items) === TRUE) {
		echo "Votre demande a bien été enregistrée.";
	} else {
		echo "ERROR : ". $sql_items . "<br>" . $conn ->error;
	}
}else{
	echo "Votre message a déjà été envoyé.";
}


$conn -> close();