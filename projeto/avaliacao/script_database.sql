drop database php_angular_avaliacao ;

create database php_angular_avaliacao;

use php_angular_avaliacao;

create table tb_alunos (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(30) NOT NULL, turma VARCHAR(30) NOT NULL, nota1 int(2) NOT NULL, nota2 int(2) NOT NULL, nota3 int(2) NOT NULL, nota4 int(2) NOT NULL);

