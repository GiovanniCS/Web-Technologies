<?php
function Valida_amm(&$errore, &$nome, &$pass){
	if(preg_match("/^admin$/",$nome) && preg_match("/^admin$/",$pass)){
		//amministratore esistente
	}
/*
	else if(altro amministratore)
*/
	else
		$errore = "Amministratore non riconosciuto";
}
?> 



