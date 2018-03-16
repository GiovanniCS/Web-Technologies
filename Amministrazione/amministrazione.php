<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_servername = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db_name = substr($cleardb_url["path"],1);

// Create connection
$conn = new mysqli($cleardb_servername, $cleardb_username, $cleardb_password, $cleardb_db_name);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}
else{
	$nome = $_POST['nomeAmm'];
	$password = $_POST['pass'];
	$errore="";
	require_once("validaamm.php");

	Valida_amm($errore,$nome,$password);

	if($errore){
		echo file_get_contents("iniamm.txt");
		echo "<p id=\"amm_err\">" . $errore . "</>". file_get_contents("fineamm.txt");
	}

else{

	$q = "SELECT * FROM mail ORDER BY id DESC";
	$risultato = $conn->query($q);
		
		if (!($risultato)) 
			echo "Query failed";
		else{
			echo file_get_contents("inizio_amm_aut.txt");
			if($risultato ->num_rows > 0) {
			
				while($row = $risultato->fetch_array(MYSQLI_ASSOC)){
					echo "\t<div class=\"inbox\">\n\n\t\t<ul>\n";
					echo "\t\t\t<li>NOME: " . $row['Nome']. "</li>\n";
					echo  "\t\t\t<li>COGNOME: " . $row['Cognome']. "</li>\n";
					echo  "\t\t\t<li><span xml:lang=\"en\">EMAIL:<span>" . $row['Email']. "</li>\n";
					echo  "\t\t\t<li>TELEFONO: " . $row['Telefono']. "</li>\n";
					echo  "\t\t\t<li>MESSAGGIO: \n";
					echo "\t\t\t\t<p>" . str_replace("\n", "</p>\n\t\t\t\t<p>", $row['Messaggio']) . "</p>\n";
					echo  "\t\t\t</li>\n";
					echo  "\t\t</ul>\n\n";
					echo  "\t<a href=\"#header_menu\" class=\"sali\">Scorri in alto</a>\n\n";
					echo "\t</div>\n";
					
				}

				$risultato->close();	
			}

			else {
				echo "<p>Nessun messaggio</p>";
			}
			echo file_get_contents("fineamm.txt");
		}
		// chiusura della connessione
		$conn->close();
	}
}
?> 



