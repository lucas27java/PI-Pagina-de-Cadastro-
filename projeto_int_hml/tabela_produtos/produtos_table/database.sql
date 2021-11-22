create database projeto_php;

use projeto_php;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL auto_increment,
  `codigo` varchar(100) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `valor` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);