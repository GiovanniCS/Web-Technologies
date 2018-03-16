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
    
    $q1= "SELECT * FROM recensioni ORDER BY id DESC";
            $ris = $conn->query($q1);
            if (!($ris)) 
                echo "Query failed";

            else{
                echo file_get_contents("irec.txt");
                if($ris ->num_rows > 0) {
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
                    $ris->close();  
                }
                else
                    echo "<p>Nessuna recensione</p>";
		echo file_get_contents("frec.txt");            
}
            // chiusura della connessione
            $conn->close();
}
?>
