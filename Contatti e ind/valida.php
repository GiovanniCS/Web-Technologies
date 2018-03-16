<?php
function CNome(&$errore, &$value){

		$value=trim($value);
		if( strlen($value)>32 || !preg_match("/^[a-zA-Z -]+$/",$value) )
				$errore = $errore . "<li>Formato nome non valido</li>";
	
}

function CCognome(&$errore, &$value){

		$value=trim($value);
		if(strlen($value)>32 || !preg_match("/^[a-zA-Z -]+$/",$value))
				$errore = $errore . "<li>Formato cognome non valido</li>";
}

function CEmail(&$errore, &$value){

		$value=trim($value);
		if(strlen($value)>64 || !preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/",$value))
				$errore = $errore . "<li>Formato email non valido</li>";	
}


function CTelefono(&$errore, &$value){

		$value=trim($value);
		if(strlen($value)<10 || strlen($value)>16 || !preg_match("/^\+?\d{10,16}$/",$value))
				$errore = $errore . "<li>Formato numero telefonico non valido</li>";		
	
}

function CMessaggio(&$errore, &$value){
		$value=trim($value);
		if(strlen($value)>512)
			$errore = $errore . "<li>Messaggio troppo lungo</li>";
		else if(strlen($value)==0)
			$errore = $errore . "<li>Messaggio richiesto</li>";
		else{
			$value = htmlentities($value,ENT_QUOTES);
		}
}

?> 



