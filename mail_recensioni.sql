CREATE TABLE `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(32) NOT NULL,
  `Cognome` varchar(32) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Telefono` varchar(16) NOT NULL,
  `Messaggio` text NOT NULL,

   PRIMARY KEY (`id`)
   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `mail` (`Nome`, `Cognome`, `Email`,`Telefono`,`Messaggio`) VALUES ( 'Mario', 'Rossi', 'mario.rossi@alice.it','333 3874154','Buonasera, desideravo avere maggiori informazioni riguardo il cofanetto fuga di due notti. Sono inclusi i pasti nel costo del cofanetto?\r\nCordiali saluti, Mario Rossi.'), ('Laura', 'Freddi', 'laura.freddi@gmail.com','327 2563985','Salve, scrivo per avere maggiori informazioni sul servizio navetta per gli ospedali. Quanto costa? Bisogna prenotarlo prima?');




CREATE TABLE `recensioni` (
  `id` int NOT NULL AUTO_INCREMENT,
  `val` int(1) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `commento` text NOT NULL,

   PRIMARY KEY (`id`)
   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `recensioni` (`val`, `nome`, `commento`) VALUES ( '5', 'GiuseppinoS', 'Relax Totale! Ottima posizione.'),( '4', 'Nicola', 'Personale accogliente. Ho passato un bellisimo weekend');
