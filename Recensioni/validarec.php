<?php
function CNome(&$errore, &$value){
		$value=trim($value);
		if(strlen($value)==0)
			$errore = $errore . "<li>Nome richiesto</li>";
		else if( strlen($value)>32 || !preg_match("/^[a-zA-Z]+$/",$value) )
			$errore = $errore . "<li>Inserisci solo caratteri nel nome</li>";

}

function CNascosto(&$errore, &$value){
		if( !preg_match("/^[0-5]$/",$value))
			$errore = $errore . "<li>La valutazione deve essere compresa da 0 a 5</li>";
}

function CCommento(&$errore, &$value){
		$value=trim($value);
		if(strlen($value)>256)
			$errore = $errore . "<li>Messaggio troppo lungo</li>";
		else if(strlen($value)==0)
			$errore = $errore . "<li>Messaggio richiesto</li>";
		else
			$value = htmlentities($value,ENT_QUOTES);
}

?> 



