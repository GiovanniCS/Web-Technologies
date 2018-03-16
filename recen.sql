CREATE TABLE `recensioni` (
  `id` int NOT NULL AUTO_INCREMENT,
  `val` int(1) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `commento` text NOT NULL,

   PRIMARY KEY (`id`)
   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `recensioni` (`val`, `nome`, `commento`) VALUES ( '5', 'GiuseppinoS', 'Relax Totale! Ottima posizione.'),( '4', 'Nicola', 'Personale accogliente. Ho passato un bellisimo weekend');




