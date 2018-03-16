<?php
$servername = "localhost";
$username = "u440215577_gio";
$password = "eePeibu2Aenilovi";
$db_name = "u440215577_gio";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}
else{
	require_once("valida.php");


	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$messaggio = $_POST['messaggio'];

	$errore="";

	CNome($errore,$nome);
	CCognome($errore,$cognome);
	CEmail($errore,$email);
	CTelefono($errore,$telefono);
	CMessaggio($errore,$messaggio);

	if($errore){
		echo file_get_contents("inizio.txt");
		echo "<ul id=\"php_err\">" . $errore . "</ul>". file_get_contents("fine.txt");
	}

	else{

		$q="INSERT INTO mail(Nome,Cognome,Email,Telefono,Messaggio) VALUES ('$nome','$cognome','$email','$telefono','$messaggio')";
		if(!$conn->query($q))
			echo "Query failed";

		else{
			echo file_get_contents("inizio.txt");
			echo "<p>Email inviata correttamente</p> ";
			echo file_get_contents("fine.txt");
		}
	}
	$conn->close();
}
?> 



