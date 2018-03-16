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
	require_once("validarec.php");
	$nascosto = $_POST['nascosto'];
	$nome = $_POST['nome'];
	$commento = $_POST['commento'];


	$errore="";

	CNascosto($errore,$nascosto);
	CNome($errore,$nome);
	CCommento($errore,$commento);


	if($errore){
		echo file_get_contents("inirec.txt");
		echo "<ul id=\"php_err\">" . $errore . "</ul>". file_get_contents("finerec.txt");
	}

	else{

		$q="INSERT INTO recensioni(val,nome,commento) VALUES ('$nascosto','$nome','$commento')";
		if(!$conn->query($q))
			echo "Query failed";
		else{

			$q1= "SELECT * FROM recensioni ORDER BY id DESC";
			$ris = $conn->query($q1);
			if (!($ris)) 
				echo "Query failed";

			else{	
				if($ris ->num_rows > 0) {
						echo file_get_contents("irec.txt");
						echo "<p id=\"p_rec\">Recensione inserita: leggila qui sotto!</p>";
					while($row = $ris->fetch_array(MYSQLI_ASSOC)){
						echo "\t<div class=\"valut\">\n\n\t\t<ul>\n";
						echo "\t\t\t<li>VALUTAZIONE: " . $row['val']. "</li>\n";
						echo "\t\t\t<li>NOME: " . $row['nome']. "</li>\n";
						echo "\t\t\t<li>COMMENTO: \n";
						echo "\t\t\t\t<p>" . str_replace("\n", "</p>\n\t\t\t\t<p>", $row['commento']) . "</p>\n";
						echo "\t\t\t</li>\n";
						echo "\t\t</ul>\n\n";
						echo "\t<a href=\"#header_menu\" class=\"sali\">Scorri in alto</a>\n\n";
						echo "\t</div>\n";	
					}
					echo file_get_contents("frec.txt");
					$ris->close();	
				}

				else {
					echo "<p>Nessuna recensione</p>";
				}
			}
			// chiusura della connessione
			$conn->close();
		}

	}

}
?> 



